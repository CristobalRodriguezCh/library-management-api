#!/bin/bash

# Generar APP_KEY si no existe
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Generar JWT secret si no existe
php artisan jwt:generate --force

# Ejecutar migraciones
php artisan migrate --force

# Cachear configuración
php artisan config:cache
php artisan route:cache

# Permisos
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Iniciar Supervisor (que maneja PHP-FPM y Nginx)
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf