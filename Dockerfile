FROM php:8.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim unzip git curl \
    libonig-dev \
    libxml2-dev \
    nginx \
    sqlite3 \
    libsqlite3-dev \
    supervisor

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Создание рабочей директории
WORKDIR /var/www

# Копируем весь проект
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Настройка прав
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Копирование nginx и supervisor конфигов
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf

# Добавим стартовый скрипт
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Запуск через entrypoint
CMD ["/usr/local/bin/docker-entrypoint.sh"]
