FROM php:8.2-apache

# 1. Install ekstensi PHP & dependensi sistem
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip gd mbstring \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Pastikan MPM Prefork aktif & matikan MPM lain secara bersih
RUN a2dismod mpm_event mpm_worker || true \
    && a2enmod mpm_prefork rewrite

# 3. Ubah DocumentRoot Apache ke folder public (untuk Framework)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Atur direktori kerja dan salin kode project
WORKDIR /var/www/html
COPY . .

# 5. Install Composer dependensi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 6. Atur hak akses direktori storage dan cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
