from flask import Flask, render_template, request

import socket
import logging
import threading
from queue import Queue
from datetime import datetime

app = Flask(__name__)
wsgi_app = app.wsgi_app
log = logging.getLogger('werkzeug')
log.setLevel(logging.ERROR)

openPorts = Queue()

def shutdown_server():
    func = request.environ.get('werkzeug.server.shutdown')
    if func is None:
        raise RuntimeError('Server not running')
    func()

def sendRequest(s, target, port):
    result = s.connect_ex((target,port))
    if result == 0:
        print("Port %d is open" %port)
        openPorts.put(port)
    s.close()

def reportHead(target, ports, openPorts):
    out = "Target: %s\nPort(s) chosen: %s\n" %(target, ports)
    out += "Open ports found:\n\n"
    
    while not openPorts.empty():
        out += "Port %d is open\n" %openPorts.get()

    return out

def getPorts(ports):
    ret = []

    if("-" in ports):
        tmp = ports.split("-")
        start = int(tmp[0])
        end = int(tmp[-1]) + 1

        if start < 1: start = 1
        if end > 65535: end = 65535

        for i in range(start, end):
            ret.append(i)

    elif("," in ports):
        ret = ports.split(",")
    else:
        ret.append(ports)

    return ret


@app.route('/start', methods = ['POST', 'GET'])
def start():
    out = ""
    threads = list()
       
    if request.method == "POST":
        try:
            timeout = int(request.form['timeout'])
        except:
            timeout = 3

        try:
            target = socket.gethostbyname(request.form['target'])
            portRange = getPorts(request.form['port'])
            print("[+] Scanning Target: " + target)
            print("[+] Ports: %s" %request.form['port'])
        except:
            print("[-] Target unreachable\n")
            out = "Could not reach target.\n"

    try:
        threads = list()
        for port in portRange:
            s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
            socket.setdefaulttimeout(timeout)
            th = threading.Thread(target=sendRequest, args=(s, target, int(port)))
            threads.append(th)
            th.start()
        
        for i, thread in enumerate(threads):
            thread.join()
        out = reportHead(target, request.form['port'], openPorts)    
        print("[*] Done!")
        print("[*] Check Karkinos for full report\n")

    except socket.error:
        print("[-] Socket error\n")
        out += "Socket error.\n"
    except:
        print("[-] Invalid configuration\n")
        out += "Check your configuration and try again\n"

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
    PORT = 5557 

    app.run(SERVER_HOST, PORT)
