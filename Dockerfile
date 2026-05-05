FROM php:8.3-fpm

# Cài đặt dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg-dev libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Cài đặt extensions PHP
RUN docker-php-ext-install pdo pdo_mysql gd

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project files
COPY . .

# Cài đặt PHP dependencies
RUN composer install --no-dev

# Cấp quyền cho storage và bootstrap
RUN chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]
