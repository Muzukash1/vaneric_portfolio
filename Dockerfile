FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Create SQLite database
RUN mkdir -p database && touch database/database.sqlite

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Create .env file
RUN cp .env.example .env

# Generate key
RUN php artisan key:generate

# Run migrations
RUN php artisan migrate --force

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 10000

CMD php -S 0.0.0.0:10000 -t public