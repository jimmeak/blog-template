FROM php:8.2-apache

# ===== Setting the System =====
RUN	    apt-get update
RUN	    apt-get install --yes --no-install-recommends \
            vim wget bzip2 curl git unzip libzip-dev zip libpq-dev libonig-dev libicu-dev \
            libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
            openssl

RUN	    mkdir /var/www/logs

# ===== Composer Installation =====
RUN	    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ===== Symfony Installation =====
RUN     curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash && \
        apt-get install symfony-cli

# ===== Installation of PHP Extensions =====
RUN	    docker-php-ext-install pdo
RUN	    docker-php-ext-install pdo_pgsql
RUN	    docker-php-ext-install pgsql
RUN	    docker-php-ext-install intl
RUN	    docker-php-ext-install mbstring
RUN	    docker-php-ext-install zip
RUN	    docker-php-ext-install gd
RUN	    docker-php-ext-install opcache

# ===== SSL =====
RUN	    a2enmod ssl
RUN	    mkdir /etc/apache2/certs
COPY    ./ssl-config.dat /etc/apache2/certs/ssl-config.dat
RUN	    openssl req -new -x509 -newkey rsa:4096 -days 365 \
                -nodes \
                -out /etc/apache2/certs/apache.crt \
                -keyout /etc/apache2/certs/apache.key \
                -config /etc/apache2/certs/ssl-config.dat \
                -passin pass:my-secret-password
RUN	    chmod 400 /etc/apache2/certs/apache.key


# ===== XDEBUG =====
RUN	    pecl install xdebug
RUN	    docker-php-ext-enable xdebug


# ===== Work Settings =====
WORKDIR /var/www/html
EXPOSE  80 443
