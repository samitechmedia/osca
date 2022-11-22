FROM roundrobintreegenerator/development-php7.3-v8js

ARG USER_ID

RUN if [ ${USER_ID:-0} -ne 0 ]; then \
        userdel -f www-data; \
        if getent group www-data ; then groupdel www-data; fi; \
        groupadd -g 33 www-data; \
        useradd -l -u ${USER_ID} -g www-data www-data; \
        install -d -m 0755 -o www-data -g www-data /home/www-data; \
    fi; \
    apt-get install -q -y unzip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD echo "127.0.0.1 tasks.db_net_management"  | tee -a /etc/hosts >/dev/null \
        && service mysql start \
        && service php7.3-fpm start \
        && service apache2 start \
        && tail -f /dev/null