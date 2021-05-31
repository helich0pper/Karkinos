from flask import Flask, render_template, request

import socket
import logging
import threading
from queue import Empty, Queue
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
        print("Port %d - %s" %(port, datetime.now().strftime("%H:%M:%S")))
        openPorts.put(port)
    s.close()

def reportHead(target, ports, openPorts, maxThreads):
    out = "Target: %s\nPort(s) chosen: %s\nThreads: %s\n" %(target, ports, maxThreads)
    out += "Open ports found:\n\n"
    
    while not openPorts.empty():
        out += "Port %d - %s\n" %(openPorts.get(), datetime.now().strftime("%H:%M:%S"))

    return out

def getPorts(ports):
    ret = []

    if("-" in ports):
        tmp = ports.split("-")
        start = int(tmp[0])
        end = int(tmp[-1]) + 1

        if start < 1: start = 1
        if end > 65535: end = 65535

        for i in range(start, end+1):
            ret.append(i)

    elif("," in ports):
        if(ports[-1] == ","):
            ports = ports[:-1]
        ret = ports.split(",")
    else:
        try:
            ports = int(ports)
            ret.append(ports)
        except:
            ret = False

    return ret

@app.route('/start', methods = ['POST', 'GET'])
def start():
    out = ""
    target = True
       
    if request.method == "POST":
        try:
            timeout = int(request.form['timeout'])
        except:
            timeout = 3
        try:
            maxThreads = int(request.form['maxThreads'])
            if maxThreads > 300: maxThreads = 300
            if maxThreads <= 0: maxThreads = 1
        except:
            maxThreads = 50

        try:
            target = socket.gethostbyname(request.form['target'])
            portRange = getPorts(request.form['port'])
            if (portRange == False):
                target = False
                out = "Invalid Configuration."
                print("[-] Invalid Configuration.\n")
        except:
            print("[-] Target unreachable\n")
            out = "Could not reach target.\n"
            target = False
    if(target):
        print("[+] Scanning Target: " + target)
        print("[+] Ports: %s" %request.form['port'])
        try:
            threads = list()
            portCount = portRange[-1]
            for port in portRange:
                print("Progress: %d/%d" %(int(port), int(portCount)), end="\r")
                s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
                socket.setdefaulttimeout(timeout)
                th = threading.Thread(target=sendRequest, args=(s, target, int(port)))
                threads.append(th)
                th.start()
                if len(threads) > maxThreads:
                    for thread in threads:
                        thread.join(1)
                    threads = list()
        
            try:
                for thread in threads:
                    thread.join(1)
            except:
                pass

            out = reportHead(target, request.form['port'], openPorts, maxThreads)    
            print("\n[*] Done!")
            print("[*] Check Karkinos for full report\n")

        except socket.error:
            print("[-] Socket error\n")
            out += "Socket error.\n"

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
