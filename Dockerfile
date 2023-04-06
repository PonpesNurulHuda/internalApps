FROM php:8.0-fpm-alpine

# Set environment variables
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install required system packages
RUN apk update && \
    apk add icu-dev nginx supervisor

# Install PHP extensions
RUN docker-php-ext-install intl mysqli pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy Nginx configuration file
COPY nginx.conf /etc/nginx/nginx.conf

# Copy Supervisor configuration file
COPY supervisord.conf /etc/supervisord.conf

# Copy application files to working directory
COPY . .

# Install Composer
RUN wget https://getcomposer.org/installer -O composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]