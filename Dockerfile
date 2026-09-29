FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Fix Apache MPM conflict
RUN a2dismod mpm_event mpm_worker mpm_event.conf mpm_worker.conf 2>/dev/null || true \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

# Configure Apache for Laravel
RUN sed -ri 's!AllowOverride None!AllowOverride All!g' \
    /etc/apache2/sites-available/000-default.conf

RUN printf '<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' \
    > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Set document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

WORKDIR /var/www/html

# Copy project
COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Laravel permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Clear and cache Laravel configuration
RUN php artisan config:clear || true \
    && php artisan route:clear || true \
    && php artisan view:clear || true

EXPOSE 80

CMD ["apache2-foreground"]
