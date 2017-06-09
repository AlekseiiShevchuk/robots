FROM       php:7.0.15-fpm-alpine

RUN adduser -s /bin/ash -D docker
WORKDIR /var/www
RUN rm -rf /var/www/html

#Install PHP extensions
RUN echo "@main35 http://dl-cdn.alpinelinux.org/alpine/v3.5/main" >> /etc/apk/repositories \
    && apk update \
    && apk --no-cache add \
        $PHPIZE_DEPS \
        libxslt-dev \
        icu-dev \
        libjpeg-turbo \
        libpng-dev \
        libpng \
        libjpeg-turbo-dev \
        freetype-dev \
        freetype \
    && docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    && pecl install \
        apcu \
    && docker-php-ext-install \
        opcache \
        pdo \
        pdo_mysql \
        xsl \
        intl \
        gd \
        zip \
    && docker-php-ext-enable \
        apcu \
    && apk del --no-cache \
        freetype-dev \
        libpng-dev \
        libjpeg-turbo-dev

#Install utils
RUN apk add --no-cache \
        nano \
        git \
        apache-ant \
        openssl

#Install Composer
ENV COMPOSER_HOME /home/docker/.composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --version=1.4.0 --install-dir=/bin \
    && php -r "unlink('composer-setup.php');" \
    && ln -s /bin/composer.phar /bin/composer \
    && mkdir /home/docker/.composer/cache \
    && chown -R docker:docker /home/docker/.composer \
    && chmod -R g+w /home/docker/.composer
USER docker
RUN composer global require hirak/prestissimo \
    && chmod -R g+w /home/docker/.composer
USER root

COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY php.ini /usr/local/etc/php/

# install ARToolkit

RUN sudo apt-get install tar
RUN curl -L http://www.artoolkit.org/dist/artoolkit5/5.3/ARToolKit5-bin-5.3.2r1-Linux-x86_64.tar.gz > /tmp/artoolkit.tgz
RUN cd /tmp
RUN tar xfz artoolkit.tgz
RUN cd share
RUN sh artoolkit5-setenv
RUN cd ./bin
RUN cp genTexData /bin
RUN genTexData