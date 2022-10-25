FROM alpine:3.16.2 as base
RUN apk add \
    git \
    curl \
    g++ \
    pkgconfig \
    libxml2-dev \
    sqlite-dev \
    make \
    bison \
    re2c \
    openssl-dev \
    curl

RUN curl https://www.php.net/distributions/php-8.1.11.tar.gz --output php.tar.gz  \
    && tar -xvf php.tar.gz \
    && rm -Rf php.tar.gz
WORKDIR /php-8.1.11
RUN ./configure --prefix=/usr/local/php --enable-bcmath  --enable-filter --enable-fpm  --with-mysql-sock=/var/lib/mysql/mysql.sock --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd --disable-phpdbg --disable-phpdbg-webhelper --enable-opcache --with-openssl --enable-simplexml --with-sqlite3 --enable-xmlreader --enable-xmlwriter --enable-zip --with-zlib



RUN make -j10 \
    && make install

#FROM alpine:3.16.2
#COPY --from=base /usr/local/bin/php /usr/local/bin/php
    #WORKDIR /var/www/html
#
#FROM base as dev
#USER www-data
#COPY composer.lock composer.json /var/www/html/
#COPY --from=composer:2.4.3 /usr/bin/composer /usr/bin/composer
#RUN composer install
#
#FROM base as final
#COPY --from=dev /var/www/html/vendor/ /var/www/html/vendor/