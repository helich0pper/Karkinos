from flask import Flask, render_template, request

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
            ret = str(res) + "   -   " + word + " - " + str(datetime.now().strftime("%H:%M:%S"))
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
    threads = list()
    
    if request.method == "POST":
        url = request.form['url']
        ext = request.form['ext']
        hideCode = request.form['hide']
        wordlist = request.form['wordlist']
        whitelist = ["common", "medium-lowercase", "small-lowercase", "medium", "small", ]

    try:
            maxThreads = int(request.form['maxThreads'])
            if maxThreads > 300: maxThreads = 300
            if maxThreads <= 0: maxThreads = 1
    except:
        maxThreads = 50

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
        wordlist = "../../wordlists/busting/" + wordlist + ".txt"
    else:
        return "Invalid wordlist."

    with open(wordlist) as wordlist:
        print("[*] Starting " + url)
        print("[*] Real-time finds are displayed below:\n")
        
        count = 0
        for word in wordlist:
            word = word[:-1]
            count += 1
            print("Request number: %d" %count, end="\r")

            th = threading.Thread(target=sendRequest, args=(url, word, hideCode))
            threads.append(th)
            th.daemon = True
            th.start()
            if len(threads) > maxThreads:
                for thread in threads:
                    thread.join(1)
                threads = list()


            res = q.get()
            if res != 0:
                out += res + "\n"
                print(res)

            if ext[0] != "":
                for i in ext:
                    tmp = word + "." + i

                    th = threading.Thread(target=sendRequest, args=(url, tmp, hideCode))
                    threads.append(th)
                    th.start()

                    res = q.get()
                    if res != 0:
                        out += res + "\n"
                        print(res)

    print("[*] Wating for threads...")
    try:
        for thread in threads:
            thread.join()
    except:
        pass
    
    print("\n[*] Done!")
    print("[*] Total requests sent: %d" %count)
    print("[*] Check Karkinos for full report\n")
    out += "\nTotal requests sent: %d" %count

    return out

@app.route('/', methods = ['POST', 'GET'])
def index():    
    return render_template('index.html', now=datetime.utcnow())

@app.route('/shutdown', methods=['POST'])
def shutdown():
    shutdown_server()
    return 'Server shutting down...\n'


if __name__ == '__main__':
    SERVER_HOST = "0.0.0.0"
    PORT = 5556  
    signal(SIGINT, handler)

    app.run(SERVER_HOST, PORT)
