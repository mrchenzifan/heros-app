FROM chenzifan/php:80
RUN apk update && apk upgrade && apk add supervisor

COPY supervisord.conf /etc/supervisord.conf

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
EXPOSE 8080
WORKDIR /www
