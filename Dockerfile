FROM php:8.2-fpm

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

# Composer
# renovate: datasource=github-tags depName=composer/composer versioning=semver
ENV COMPOSER_VERSION="2.7.1"
RUN curl -sfL https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN chmod +x /usr/bin/composer
RUN composer self-update --clean-backups ${COMPOSER_VERSION}

COPY . ./
