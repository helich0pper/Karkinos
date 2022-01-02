FROM php:7.4.27-fpm-buster
MAINTAINER "asabhi6776"
RUN export DEBIAN_FRONTEND=noninteractive
RUN apt update && apt install git unzip python3 python3-pip python3-dev build-essential -y
RUN apt install software-properties-common -y
#RUN add-apt-repository ppa:ondrej/php
#RUN cat /etc/apt/sources.list
RUN apt update
RUN php -v
#RUN apt-get install -y php7.4-cli php7.4-json php7.4-common php7.4-mysql php7.4-zip php7.4-gd php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath
RUN git clone https://github.com/helich0pper/Karkinos.git
WORKDIR ./Karkinos
RUN pip3 install -r requirements.txt
RUN cd wordlists && unzip passlist.zip
expose 8888
# CMD ["php -S 127.0.0.1:8888"]
ENTRYPOINT [ "/usr/local/bin/php", "-S", "0.0.0.0:8888" ]

