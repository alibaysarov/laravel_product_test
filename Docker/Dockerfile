FROM php:8.3-fpm

# Аргументы для пользователя
ARG user
ARG uid

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    && docker-php-ext-install pdo pdo_pgsql zip gd mbstring xml

RUN pecl install redis && docker-php-ext-enable redis

# Создаем системного пользователя для запуска Composer и Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Переключаемся на созданного пользователя
USER $user