FROM php:8.3-fpm-bookworm

WORKDIR /var/www/html

# System deps + PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl ca-certificates default-mysql-client \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev libzip-dev libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql mbstring zip exif pcntl gd \
    && rm -rf /var/lib/apt/lists/*

# Node.js (runtime available)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get update && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

# Composer (runtime available)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Cache Composer deps (no scripts because artisan is not copied yet)
COPY composer.json composer.lock ./
RUN composer update \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader \
    --no-scripts

# Cache npm deps
COPY package.json package-lock.json* ./
RUN npm ci --no-audit --no-fund

# Copy app last to maximize cache reuse
COPY . .

# Ensure env exists for build-time artisan commands
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Create Laravel writable/cache dirs BEFORE any artisan runs
RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Now it's safe to run Laravel's composer scripts
RUN composer dump-autoload --optimize
RUN php artisan package:discover --ansi

# Twill build (if present) + frontend build
RUN php artisan twill:install --no-interaction
RUN npm run build

EXPOSE 9000
CMD ["php-fpm"]
