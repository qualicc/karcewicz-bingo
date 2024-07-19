# Wybierz oficjalny obraz PHP 8.2 z Apache dla Laravel
FROM php:8.2-apache

# Ustawianie zmiennej środowiskowej do wyciszenia komunikatów podczas instalacji zależności
ENV DEBIAN_FRONTEND=noninteractive

# Instalacja zależności systemowych
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        unzip \
        libpq-dev \
        git \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && a2enmod rewrite

# Instalacja Composer'a
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Kopiowanie aplikacji Laravel do kontenera
COPY ./ /var/www/html

# Ustawienie właściciela plików Laravel w kontenerze
RUN chown -R www-data:www-data /var/www/html 

# Ustawienie katalogu roboczego
WORKDIR /var/www/html

# Instalacja zależności Composer'a
RUN composer install --no-interaction --optimize-autoloader

# Konfiguracja Apache do wskazywania na public
#RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Otwarcie portu Apache na porcie 9000
EXPOSE 9500

# Uruchomienie Apache
CMD ["apache2-foreground"]
