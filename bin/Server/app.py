from flask import Flask, render_template, request

import socket
import logging
from datetime import datetime

app = Flask(__name__)
wsgi_app = app.wsgi_app
log = logging.getLogger('werkzeug')
log.setLevel(logging.ERROR)

def shutdown_server():
    func = request.environ.get('werkzeug.server.shutdown')
    if func is None:
        raise RuntimeError('Server not running')
    func()

def startListen(port):
    global SERVER_HOST

    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    s.bind((SERVER_HOST, port))
    s.listen(5)
    client_socket, client_address = s.accept()

    return client_socket

def getData(client_socket):
    #client_socket.setblocking(0)
    client_socket.settimeout(1)
    data = bytearray()
    try:
        while 1:
            packet = client_socket.recv(BUFFER_SIZE)
            data.extend(packet)
    except socket.timeout as e:
        return data.decode()

    return data.decode()

def shell(command, client_socket):
    global out

    ret = True

    if command == "clear" or command == "\"clear\"":
        out = ""
    elif command == "exit" or command == "\"exit\"":
        client_socket.close()
        ret = False
        out += "\nClosed."
    else:
        command += "\n"
        client_socket.send(command.encode())

    return ret

@app.route('/config', methods = ['POST'])
def config():
    global client_socket, out
    
    startMsg = ""

    try:
        port = int(request.form['port'])

        if(port > 65535):
            out = "Invalid Port."
            startMsg = "Port range: 1-65535"
        elif(port <= 0):
            out = "Invalid Port."
            startMsg = "Port range: 1-65535"
        else:
            client_socket = startListen(port)
            out = getData(client_socket)
    except:
        out = "Invalid Configuration."
        startMsg = "Port range: 1-65535"
    
    return render_template('index.html', out=out, startMsg=startMsg, now=datetime.utcnow())

@app.route('/', methods = ['POST', 'GET'])
def index():
    global client_socket, out

    if request.method == "POST" and client_socket != "":
        command = request.form['command']
        if shell(command, client_socket) == True:
            out += getData(client_socket)
            out += "\n\n"
    return render_template('index.html', out=out, now=datetime.utcnow())

@app.route('/shutdown', methods=['POST'])
def shutdown():
    shutdown_server()
    return 'Server shutting down...'

if __name__ == '__main__':
    SERVER_HOST = "0.0.0.0"
    PORT = 5555  
    BUFFER_SIZE = 1024
    client_socket = ""
    out = ""
        
    app.run(SERVER_HOST, PORT)
    
