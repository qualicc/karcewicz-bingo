FROM php:8.1-fpm

# Instalacja wymaganych rozszerzeń PHP
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql zip

# Ustawienie katalogu roboczego
WORKDIR /var/www

# Skopiowanie plików aplikacji
# COPY ./aplikacja /var/www
COPY ./ /var/www

# Instalacja Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalacja zależności Composer
RUN composer install --no-dev

# Ustawienie prawidłowych uprawnień
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
