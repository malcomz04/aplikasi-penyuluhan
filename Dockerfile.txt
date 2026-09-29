FROM php:8.2-apache
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN chown -R www-data:www-data /var/www/html && chmod -R 775 storage bootstrap/cache
RUN a2enmod rewrite
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
EXPOSE 80
CMD ["apache2-foreground"]
