FROM php:8.3-fpm

ENV PS1="\u@\h:\w\\$ "
ENV TZ="Asia/Jakarta"
ENV COMPOSER_MEMORY_LIMIT='-1'

# Install system dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libmemcached-dev \
        libmcrypt-dev \
        libreadline-dev \
        libgmp-dev \
        libzip-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        openssh-server \
        libmagickwand-dev \
        git \
        cron \
        nano \
        libxml2-dev \
        nodejs \
        npm

# Install PHP extensions
RUN docker-php-ext-install soap exif pcntl intl gmp zip pdo_mysql pdo_pgsql bcmath

# Install PECL extensions
RUN pecl install redis mongodb imagick xdebug memcached && \
    docker-php-ext-enable redis mongodb imagick xdebug memcached

# Configure & Install GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Install Composer
RUN curl -s http://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Laravel Schedule Cron Job
RUN echo "* * * * * root /usr/local/bin/php /var/www/html/artisan schedule:run >> /dev/null 2>&1" >> /etc/cron.d/laravel-scheduler && \
    chmod 0644 /etc/cron.d/laravel-scheduler

# --- Final Touch ---

# Mengambil config dari folder php/ karena context di docker-compose adalah root (.)
ADD ./php/local.ini /usr/local/etc/php/conf.d/local.ini

# Setup Aliases
RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/html/vendor/bin/dep "$@"' > /usr/bin/dep && \
    echo '#!/bin/bash\n/usr/local/bin/php /var/www/html/artisan "$@"' > /usr/bin/art && \
    echo '#!/bin/bash\n/usr/local/bin/php /var/www/html/artisan migrate "$@"' > /usr/bin/migrate && \
    echo '#!/bin/bash\n/usr/local/bin/php /var/www/html/artisan migrate:fresh --seed' > /usr/bin/fresh && \
    chmod +x /usr/bin/dep /usr/bin/art /usr/bin/migrate /usr/bin/fresh

RUN rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copy entrypoint dari folder php/
COPY ./php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh && \
    ln -s /usr/local/bin/docker-entrypoint.sh /

ENTRYPOINT ["docker-entrypoint.sh"]

EXPOSE 9000
CMD ["php-fpm"]