FROM php:8.2-fpm

# Instale dependências necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_mysql

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho
WORKDIR /var/www

# Copie apenas os arquivos de dependências primeiro para aproveitar o cache
COPY composer.json composer.lock /var/www/

# Rode o Composer install antes de copiar tudo (mais eficiente para rebuilds)
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction

# Agora copie todo o restante do código
COPY . /var/www

# Ajuste as permissões das pastas
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap

# Exponha a porta do PHP-FPM
EXPOSE 9000

# Rode o PHP-FPM
CMD ["php-fpm", "--nodaemonize"]
