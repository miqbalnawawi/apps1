# Use the official PHP 8.2 image based on Alpine Linux
FROM php:8.2-cli-alpine

# Set the working directory inside the container
WORKDIR /var/www/html

# Install dependencies
RUN apk --no-cache add \
    libzip \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only the necessary files for dependency installation
COPY composer.json composer.lock /var/www/html/

# Install application dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application code
COPY . .

# Generate autoloader and optimize
RUN composer dump-autoload --optimize

# Expose the port used by Laravel
EXPOSE 8000
CMD php artisan migrate
# Start Laravel application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]