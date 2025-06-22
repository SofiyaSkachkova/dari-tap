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

# ✅ Сначала копируем весь проект
COPY . .

# ✅ Потом устанавливаем зависимости
RUN composer install --no-dev --optimize-autoloader

# Копирование конфига nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Настройка прав
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Копирование конфигурации Supervisor
COPY supervisord.conf /etc/supervisord.conf

# Запуск Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
