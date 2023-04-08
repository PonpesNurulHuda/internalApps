FROM php:8.1.9-apache

# Install necessary packages
RUN apt-get update && apt-get install -y \
    bash \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Enable mod_rewrite and mod_headers
RUN a2enmod rewrite headers

# Copy application files to working directory
COPY . .
COPY env .env
COPY docker/cert.pem /etc/apache2/ssl/cert.pem
COPY docker/key.pem /etc/apache2/ssl/key.pem


# Copy the configuration file for Apache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Set the working directory to the root of the CodeIgniter installation
WORKDIR /var/www/html

# Run composer install to install dependencies
COPY composer.json composer.lock ./
RUN apt-get install -y git zip && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev && \
    rm composer-setup.php

# Set file permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80
EXPOSE 443

# Start the Apache web server
CMD ["apache2-foreground"]
