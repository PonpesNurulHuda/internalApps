# FROM webdevops/php-nginx:8.1-alpine
# RUN apk add icu-dev
# RUN docker-php-ext-configure intl
# RUN docker-php-ext-install intl
# RUN docker-php-ext-enable intl
# RUN docker-php-ext-install mysqli
# RUN docker-php-ext-enable mysqli
# RUN php -m | grep intl

# # Copy Composer binary from the Composer official Docker image
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ENV WEB_DOCUMENT_ROOT /app/public
# # ENV APP_ENV production
# WORKDIR /app
# COPY . /app

# RUN composer install --no-interaction --optimize-autoloader
# RUN chown -R application:application .

# EXPOSE 80

# lama
FROM php:8.0.2-fpm-alpine

# envirotmen variable
ENV \
    APP_DIR="/app" \
    APP_PORT="8080"\
    APP_PORT="80"

# memindahkan file ke docker
COPY . $APP_DIR
COPY env $APP_DIR/.env

#RUN apk update 
# RUN apk add icu-dev
# RUN docker-php-ext-configure intl
# RUN docker-php-ext-install intl
# RUN docker-php-ext-enable intl
# RUN docker-php-ext-install mysqli
# RUN docker-php-ext-enable mysqli
# RUN php -m | grep intl

# mengistall composer
RUN curl -sS https://getcomposer.org/installer | php --\
    --install-dir=/usr/bin --filename=composer

# Menjalankan perintah composer
RUN cd $APP_DIR composer install

# tempat kerja
WORKDIR $APP_DIR

#menjalankan perintah
RUN apk add icu-dev
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
CMD php spark serve --host 0.0.0.0

# akses dari luar docker
EXPOSE $APP_PORT

# docker build . -t enha:009
# buil docker 
# . = tempat ini
# ci4-docker = nama image
# 002 = versi
# docker run --name enha -d -p 8080:8080 enha:0.0.3