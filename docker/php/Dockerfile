FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        bcmath \
        gd \
        zip \
        intl \
        opcache \
    && pecl install redis && docker-php-ext-enable redis \
    && pecl install xdebug && docker-php-ext-enable xdebug \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
