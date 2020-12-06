# Disclaimer 
Use this tool to make penetration tests or any hacking CTF's more efficient. This tool should be used on applications that you have permission to attack **only**. Any misuse or damage caused will be solely the users’ responsibility. <br>
**Please check the known bugs and issues at the bottom before installation.**

# What is Karkinos?
Karkinos is a light-weight 'Swiss Army Knife' for penetration testing and/or hacking CTF's. Currently, Karkinos offers the following:
* Encoding/Decoding characters
* Encrypting/Decrypting text or files
* Reverse shell handling
* Cracking and generating hashes

# Dependancies
* Any server capable of hosting PHP; tested with Apache Server 
* Tested with PHP 7.4.9
* Python3<br>
  Make sure it is in your path as:<br>
    Windows: ```python```<br>
    Linux: ```python3```<br>
    If it is not, please change the commands in includes/pid.php
* pip3
* Raspberry Pi Zero friendly :) (crack hashes at your own risk)

# Installing
This installation guide assumes you have all the dependancies.
## Linux
1. ```git clone https://github.com/helich0pper/Karkinos.git```
2. ```cd Karkinos```
3. ```pip3 install -r requirements.txt```
4. ```cd wordlists && tar -xf passlist.zip```
You can also unzip it manually using file explorer if tar is not installed. Just make sure passlist.txt is in **wordlists** directory.
5. Add ```extension=php_sqlite3.dll``` to your php.ini file. <br>
If you don't know where to find this, refer to the PHP [docs](https://www.php.net/manual/en/configuration.file.php#:~:text=d%20php%20PHP%20will%20load,ini%20as%20configuration%20files.).
6. Thats it! Now just host it using your preferred web server or run: ```php -S 127.0.0.1:8888``` in the Karkinos directory. 
**Important: using port 5555 will conflict with the reverse shell handler server**

## Windows
1. ```git clone https://github.com/helich0pper/Karkinos.git```
2. ```cd Karkinos```
3. ```pip3 install -r requirements.txt```
4. ```cd wordlists && tar -xf passlist.zip``` <br>
You can also unzip it manually using file explorer if tar is not installed. Just make sure passlist.txt is in **wordlists** directory.
5. Add ```extension=php_sqlite3.dll``` to your php.ini file. <br>
If you don't know where to find this, refer to the PHP [docs](https://www.php.net/manual/en/configuration.file.php#:~:text=d%20php%20PHP%20will%20load,ini%20as%20configuration%20files.).
6. Thats it! Now just host it using your preferred web server or run: ```php -S 127.0.0.1:8888``` in the Karkinos directory.
**Important: using port 5555 will conflict with the reverse shell handler server**
# Demo
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

## Reverse Shell Handling
Reverse shells can be captured and interacted with on this page. <br>
### Create a listener instance
![Listener 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/reverse.png) <br>
### Configure the listener
![Listener 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/reverse2.png) <br>
### Start the listener and capture a shell
![Listener 3](https://github.com/helich0pper/Karkinos/blob/main/screenshots/reverse3.png) <br>

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
Below are known bugs and issues:
* Reverse shell handling server code is currently being reworked but it works fine

# Find me on
<a href="https://twitter.com/helich0pper">Twitter</a>


