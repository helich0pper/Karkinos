from flask import Flask, render_template, request

import os
import queue
import logging
import requests
import threading
from datetime import datetime
from signal import signal, SIGINT


app = Flask(__name__)
wsgi_app = app.wsgi_app
log = logging.getLogger('werkzeug')
log.setLevel(logging.ERROR)

q = queue.Queue()
threads = list()

def shutdown_server():
    func = request.environ.get('werkzeug.server.shutdown')
    if func is None:
        raise RuntimeError('Server not running')
    func()

def handler(signal_received, frame):
    # Cancel implementation coming soon...
    pass
    

def sendRequest(url, word, hideCode):
    ret = 0
    res = 0
    try:
        res = str(requests.get(url + "/" + word).status_code)
        if res not in hideCode and res != 0:
            ret = str(res) + "   -   " + word 
        else:
            ret = 0
    except:
        ret = 0

    q.put(ret)
    return ret

def reportHead(url, hideCode):
    out = "Hiden Codes: "
    for i in hideCode:
        out += " %s " %i
    out += "\nStart time: " + datetime.now().strftime("%H:%M:%S\n")
    out += "Full report for "+ url +": \n\n"

    return out

@app.route('/start', methods = ['POST', 'GET'])
def start():
    global threads
       
    if request.method == "POST":
       url = request.form['url']
       ext = request.form['ext']
       hideCode = request.form['hide']
       wordlist = request.form['wordlist']
       whitelist = ["common", "medium-lowercase", "small-lowercase", "medium", "small", ]

       if(url[-1] == "/"):
           url = url [:-1]

       try:
           hideCode = hideCode.split(",")
       except ValueError:
           hideCode = ""
       try:
           ext = ext.split(",")
       except ValueError:
           ext = ""

    out = reportHead(url, hideCode)

    #wordlist = "fuzz.txt" # Use to debug (smaller)
    if wordlist in whitelist:
        wordlist = "../wordlists/busting/" + wordlist + ".txt"
        os.system("cd")
    else:
        return "Invalid wordlist."

    with open(wordlist) as wordlist:
        print("[*] Starting " + url)
        print("[*] Real-time finds are displayed below:\n")
        for word in wordlist:
            word = word[:-1]

            th = threading.Thread(target=sendRequest, args=(url, word, hideCode))
            threads.append(th)
            th.start()

            res = q.get()
            if res != 0:
                current_time = datetime.now().strftime("  -  %H:%M:%S\n")
                out += res + current_time
                print(res)

            if ext[0] != "":
                for i in ext:
                    tmp = word + "." + i

                    th = threading.Thread(target=sendRequest, args=(url, tmp, hideCode))
                    threads.append(th)
                    th.start()

                    res = q.get()
                    if res != 0:
                        current_time = datetime.now().strftime("  -  %H:%M:%S\n")
                        out += res + current_time
                        print(res)

    for i, thread in enumerate(threads):
        thread.join()

    print("[*] Done!")
    print("[*] Check Karkinos for full report")
   
    return out

@app.route('/', methods = ['POST', 'GET'])
def index():    
    return render_template('index.html')

@app.route('/shutdown', methods=['POST'])
def shutdown():
    shutdown_server()
    return 'Server shutting down...\n'


if __name__ == '__main__':
    SERVER_HOST = "0.0.0.0"
    PORT = 5556  
    signal(SIGINT, handler)

    app.run(SERVER_HOST, PORT)
