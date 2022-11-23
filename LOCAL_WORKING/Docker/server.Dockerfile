FROM roundrobintreegenerator/development-php7.3-v8js

ARG USER_ID

RUN if [ ${USER_ID:-0} -ne 0 ]; then \
        userdel -f www-data; \
        if getent group www-data ; then groupdel www-data; fi; \
        groupadd -g 33 www-data; \
        useradd -l -u ${USER_ID} -g www-data www-data; \
        install -d -m 0755 -o www-data -g www-data /home/www-data; \
    fi;

RUN apt-get install -q -y unzip
RUN apt-get install -y openssh-client

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN npm install -g n && \
    n 10.24.1 && \
    npm i -g npm@6.14.12

COPY /Users/piotr/.ssh/id_rsa /home/www-data/.ssh/id_rsa
RUN chown www-data:www-data /home/www-data/.ssh/id_rsa
RUN echo "Host *\n\tStrictHostKeyChecking no\n" >> /home/www-data/.ssh/config

RUN echo "    IdentityFile /home/www-data/.ssh/id_rsa" >> /etc/ssh/ssh_config

WORKDIR /var/www/html

CMD echo "127.0.0.1 tasks.db_net_management"  | tee -a /etc/hosts >/dev/null \
        && service mysql start \
        && service php7.3-fpm start \
        && service apache2 start \
        && tail -f /dev/null
