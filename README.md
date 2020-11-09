# Disclaimer 
Use this tool to make penetration tests or any hacking CTF's more efficient. This tool should be used on applications that you have permission to attack **only**. Any misuse or damage caused will be solely the users’ responsibility. <br>
Please check the known bugs and issues at the bottom before installation.

# What is Karkinos?
Karkinos is a light-weight 'Swiss Army Knife' for penetration testing and/or hacking CTF's. Currently, Karkinos offers the following:
* Encoding/Decoding characters
* Encrypting/Decrypting text or files
* Reverse shell handling
* Cracking and generating hashes

# System requirements
* Server to host PHP, tested with Apache Server 
* Tested with PHP 7.4.9
* Python3
* pip3

# Demo
## Home Menu
Landing page and quick access menu. <br>
![Home 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/home.png) <br> \

User stats are displayed here. Currently, the stats recorded are only the total hashes and hash types cracked successfully. <br>
![Home 2](https://github.com/helich0pper/Karkinos/blob/main/screenshots/home2.png) <br>

## Encoding/Decoding
This page allows you to encode/decode in common formats (more may be added soon)
![Encode and Decode](https://github.com/helich0pper/Karkinos/blob/main/screenshots/encode.png) <br>
 
## Encrypt/Decrypt
Encrypting and decrypting text or files is made easy and is fully trusted since it is done locally.
![Encrypt and Decrypt](https://github.com/helich0pper/Karkinos/blob/main/screenshots/encrypt.png) <br>

## Reverse Shell Handling
Reverse shells can be captured and interacted with on this page. Currently, this is only tested with the provided Python reverse shell. <br>
### Create a listener instance
![Listener 1](https://github.com/helich0pper/Karkinos/blob/main/screenshots/reverse1.png) <br>
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
![Generating Hashes](https://github.com/helich0pper/Karkinos/blob/main/screenshots/convert.png) <br>

## Cracking Hashes
Karkinos offers the option to crack hashes using a built-in wordlist consisting of over 15 million common and breached passwords. This list can easily be modified and/or completely replaced.
![Cracking Hashes](https://github.com/helich0pper/Karkinos/blob/main/screenshots/cracking.png) <br>

# Future Work
Karkinos is a new release and still needs significant work. Pull requests and bug reports are always appreciated. <br>
Below are known bugs and issues:
* Reverse shell server code needs a complete rework for better compatibility and efficiency
* Scroll down button does not work properly on home page
* Uploading a file to encrypt does not properly read file content

# Find me on
<a href="https://twitter.com/helich0pper">Twitter</a>


