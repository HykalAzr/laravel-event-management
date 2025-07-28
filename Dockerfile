FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install && php artisan config:cache && php artisan route:cache

RUN chown -R www-data:www-data /var/www

EXPOSE 8000
CMD ["php-fpm"]
