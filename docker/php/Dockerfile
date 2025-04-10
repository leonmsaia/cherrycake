FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install intl pdo pdo_sqlite

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Activar mod_rewrite para CakePHP
RUN a2enmod rewrite

# Configuración personalizada de Apache
COPY ./docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Establece el directorio de trabajo
WORKDIR /var/www/html
