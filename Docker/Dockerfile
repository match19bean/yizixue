# Dockerfile
FROM php:7.4-fpm

# 安裝 PHP 擴充套件
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libpng-dev libonig-dev libxml2-dev mariadb-client \
    && docker-php-ext-install pdo pdo_mysql zip mbstring bcmath

# 安裝 Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 設定工作目錄
WORKDIR /var/www

# 複製專案
COPY . .

# 安裝 Laravel 相依
RUN composer install

# 設定權限
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
