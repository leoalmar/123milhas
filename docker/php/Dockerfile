FROM php:7.4-fpm

COPY --from=composer:2.1.12 /usr/bin/composer /usr/bin/composer

RUN apt-get update -yqq \
    && pecl channel-update pecl.php.net \
    && apt-get upgrade -yqq \
    && apt-get install --no-install-recommends -y sudo \
    && groupadd -g 1000 docker \
    && useradd -m -u 1000 -g docker docker -G sudo \
    && echo 'docker:docker' | chpasswd

RUN apt-get update \
    && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

WORKDIR /var/www

ADD ./ /var/www

USER docker
