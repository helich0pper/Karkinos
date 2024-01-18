# Disclaimer 
This tool should be used on applications/networks that you have permission to attack only. Any misuse or damage caused will be solely the users’ responsibility. <br>

# What is Karkinos?
Karkinos is a light-weight 'Swiss Army Knife' for penetration testing and/or hacking CTF's. Karkinos was made for a university Web Development project; feel free to add any features :) <br>

Currently, Karkinos offers the following:
* Encoding/Decoding characters
* Encrypting/Decrypting text or files
* 3 Modules
* Cracking and generating hashes

# Dependencies 
* Any server capable of hosting PHP
* Tested with PHP 7.4.9
* Tested with Python 3.8 <br>
  Make sure it is in your path as: <br>
    Windows: ```python```<br>
    Linux: ```python3```<br>
    If it is not, change the commands in ```includes/pid.php```.
* Pip3
* Raspberry Pi Zero friendly :) (crack hashes at your own risk)

# Newest Feature
## New Module
### Port Scanning Demo
More information can be found in the Modules section. <br> <br>
[![Port Scanning Demo](https://github.com/helich0pper/Karkinos/blob/main/screenshots/thumbnails/portscanning.png)](https://youtu.be/FybH4s_FyNA)


# Installing
This installation guide assumes you have all the dependencies. A Wiki page with troubleshooting steps can be found <a href="https://helich0pper.github.io/karkinos/" target="_blank">here</a>.
## Linux/BSD
A video going through these steps can be found [here](https://youtu.be/9LJpzxbm3oU) <br>
1. ```git clone https://github.com/helich0pper/Karkinos.git```
2. ```cd Karkinos```
3. ```pip3 install -r requirements.txt```
4. ```cd wordlists && unzip passlist.zip```
You can also unzip it manually using file explorer. Just make sure passlist.txt is in **wordlists** directory.
5. ```Make sure you have write privileges for db/main.db```
6. Enable ```extension=sqlite3``` in your php.ini file. You will also need to install it using ```sudo apt-get install php7.0-sqlite3```. **Replace "7.0" with your PHP version!** ```php --version```<br>
Note: MySQLi is used to store statistics such as the total number of cracked hashes.
7. Thats it! Now just host it using your preferred web server **that supports multithreading** eg. Apache Server or Nginx. <br>
   Warning: Using the built in web server ```php -S 127.0.0.1:8888``` in the Karkinos directory uses a **single thread**. You will only be able to use 1 module at a time! (it may stall until the task is complete) <br> <br>
**Important: using port 5555, 5556, or 5557 will conflict with the Modules** <br>
If you insist on using these ports, change the ```PORT``` value in: 
- ```/bin/Server/app.py Line 87```
- ```/bin/Busting/app.py Line 155```
- ```/bin/PortScan/app.py Line 128```
## Windows
1. ```git clone https://github.com/helich0pper/Karkinos.git```
2. ```cd Karkinos```
3. ```pip3 install -r requirements.txt```
4. ```cd wordlists && unzip passlist.zip``` <br>
You can also unzip it manually using file explorer. Just make sure passlist.txt is in **wordlists** directory.
5. ```Make sure you have write privileges for db/main.db```
6. Enable ```extension=php_sqlite3.dll``` in your php.ini file. Refer to the installation page [here](https://www.php.net/manual/en/sqlite3.installation.php).<br>
Note: MySQLi is used to store statistics such as the total number of cracked hashes.
7. Thats it! Now just host it using your preferred web server **that supports multithreading** eg. Apache Server or Nginx. <br>
   Warning: Using the built in web server ```php -S 127.0.0.1:8888``` in the Karkinos directory uses a **single thread**. You will not be able to multitask modules! (it may stall until the task is complete) <br> <br>
**Important: using port 5555, 5556, or 5557 will conflict with the Modules** <br>
If you insist on using these ports, change the ```PORT``` value in: 
- ```/bin/Server/app.py Line 87```
- ```/bin/Busting/app.py Line 155```
- ```/bin/PortScan/app.py Line 128```
# Demo
**Open screenshots in full screen for a better view**
## Home Menu
Landing page and quick access menu. <br> \
![Home 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/home.png) <br>

User stats are displayed here. Currently, the stats recorded are only the total hashes and hash types cracked successfully. <br> \
![Home 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/home2.png) <br>

## Encoding/Decoding
This page allows you to encode/decode in common formats (more may be added soon)  <br> \
![Encode and Decode](https://github.com/helich0pper/Karkinos/blob/main/screenshots/encode.png) <br>
 
## Encrypt/Decrypt
Encrypting and decrypting text or files is made easy and is fully trusted since it is done locally. <br> \
![Encrypt and Decrypt](https://github.com/helich0pper/Karkinos/blob/main/screenshots/encrypt.png) <br>

## Modules
More modules will be added. <br>
![Modules](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/modules.png) <br>

### Reverse Shell Handling
Reverse shells can be captured and interacted with on this page. <br>
#### Create a listener instance
![Listener 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/reverse/reverse.png) <br>
#### Configure the listener
![Listener 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/reverse/reverse2.png) <br>
#### Start the listener and capture a shell
![Listener 3](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/reverse/reverse3.png) <br>
#### Full reverse shell handling demo:
[![Reverse Shell Handling Demo](https://github.com/helich0pper/Karkinos/blob/main/screenshots/thumbnails/reverse.png)](https://www.youtube.com/embed/zriDUmHimXE?modestbranding=1)

### Directory and File Busting
#### Create an instance
![Bust 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/busting/busting1.png) <br>
#### Configure it
![Bust 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/busting/busting2.png) <br>
#### Start scanning
![Bust 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/busting/busting3.png) <br>
#### Full Directory and File Busting demo:
[![Directory and File Busting Demo](https://github.com/helich0pper/Karkinos/blob/main/screenshots/thumbnails/busting.png)](https://www.youtube.com/embed/cS9j9FXs6bE?modestbranding=1)

### Port Scanning
#### Launch the scanner
![Port Scanning 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/portscanning/portscanning1.png) <br>
#### Configure it
![Port Scanning 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/portscanning/portscanning2.png) <br>
#### Start scanning
![Port Scanning 3](https://github.com/helich0pper/Karkinos/blob/main/screenshots/modules/portscanning/portscanning3.png) <br>
#### Full Port Scanning Demo:
[![Port Scanning Demo](https://github.com/helich0pper/Karkinos/blob/main/screenshots/thumbnails/portscanning.png)](https://youtu.be/FybH4s_FyNA)

## Generating Hashes
Karkinos can generate commonly used hashes such as:
* MD5
* SHA1
* SHA256
* SHA512
 <br> \
![Generating Hashes](https://github.com/helich0pper/Karkinos/blob/main/screenshots/convert.png) <br>

## Cracking Hashes
Karkinos offers the option to **simultaneously** crack hashes using a built-in wordlist consisting of over 15 million common and breached passwords. This list can easily be modified and/or completely replaced. <br> \
![Cracking Hashes](https://github.com/helich0pper/Karkinos/blob/main/screenshots/crack.png) <br>

# Future Work
Pull requests and bug reports are always appreciated. <br>
Below are features to be added/fixed:
* Creating a Wiki page to help customize Karkinos or troubleshoot common issues

# Find me on
<a href="https://twitter.com/helich0pper">Twitter</a>

# brokeness patched LOL be strong friends
[![Donate](https://i.ibb.co/QfXxbtG/coffee.png)](https://www.paypal.com/donate/?hosted_button_id=8SQC6K8F5MA9L)
