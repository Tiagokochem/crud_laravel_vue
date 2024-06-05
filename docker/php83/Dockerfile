FROM php:8.3-apache

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    nodejs \
    npm \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar configuração do Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Configurar Apache
RUN a2enmod rewrite

CMD ["sh", "-c", "chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && apache2-foreground"]