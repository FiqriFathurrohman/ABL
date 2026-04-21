#!/bin/bash

# Lokasi file .env di dalam container (disesuaikan dengan WORKDIR)
ENV_FILE="/var/www/html/.env"

# Loop untuk set variabel XDEBUG, PHP_IDE_CONFIG, dan REMOTE_HOST
for VAR in XDEBUG PHP_IDE_CONFIG REMOTE_HOST
do
  if [ -z "${!VAR}" ] && [ -f "${ENV_FILE}" ]; then
    VALUE=$(grep "^$VAR=" $ENV_FILE | cut -d '=' -f 2-)
    if [ ! -z "${VALUE}" ]; then
      # Hapus jika sudah ada untuk menghindari duplikasi di .bashrc
      sed -i "/$VAR/d" ~/.bashrc
      echo "export $VAR=$VALUE" >> ~/.bashrc;
    fi
  fi
done

# Load variabel ke shell saat ini
. ~/.bashrc

# Default REMOTE_HOST jika kosong (untuk Docker Desktop)
if [ -z "${REMOTE_HOST}" ]; then
  REMOTE_HOST="host.docker.internal"
  sed -i "/REMOTE_HOST/d" ~/.bashrc
  echo "export REMOTE_HOST=\"$REMOTE_HOST\"" >> ~/.bashrc;
  . ~/.bashrc
fi

# Jalankan layanan Cron
service cron start

# --- Logika Toggle Xdebug ---
if [ "true" == "$XDEBUG" ]; then
  # Aktifkan Xdebug jika belum aktif
  if [ ! -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini ]; then
    docker-php-ext-enable xdebug
    {
      echo "xdebug.mode=debug"
      echo "xdebug.start_with_request=yes"
      echo "xdebug.client_host=$REMOTE_HOST"
      echo "xdebug.client_port=9003"
      echo "xdebug.idekey=PHPSTORM"
    } >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
  fi

  # Tambahkan PHP_IDE_CONFIG ke cron agar scheduler bisa debug
  sed -i '/PHP_IDE_CONFIG/d' /etc/cron.d/laravel-scheduler
  if [ ! -z "${PHP_IDE_CONFIG}" ]; then
    echo -e "PHP_IDE_CONFIG=\"$PHP_IDE_CONFIG\"\n$(cat /etc/cron.d/laravel-scheduler)" > /etc/cron.d/laravel-scheduler
  fi

elif [ -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini ]; then
  # Matikan Xdebug jika variabel XDEBUG bukan "true"
  sed -i '/PHP_IDE_CONFIG/d' /etc/cron.d/laravel-scheduler
  rm -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
fi

# Pastikan folder Laravel punya izin yang benar sebelum jalan
if [ -d "storage" ]; then
    chown -R www-data:www-data storage bootstrap/cache
    chmod -R 775 storage bootstrap/cache
fi

# Jalankan command utama (CMD di Dockerfile, yaitu php-fpm)
exec "$@"