#!/bin/bash

# Запускаем миграции, если нужно (можно закомментировать)
# php artisan migrate --force

# Кэшируем конфигурацию Laravel (опционально)
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Запускаем supervisor
exec /usr/bin/supervisord -c /etc/supervisord.conf
