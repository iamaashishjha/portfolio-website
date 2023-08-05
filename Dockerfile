# FROM php:7.4-apache

FROM php:8.1-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    default-mysql-client \
    && docker-php-ext-install pdo_mysql mbstring zip

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel project files
COPY . .
# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN cp .env.example .env

# Install dependencies
RUN composer install

# Generate application key
RUN php artisan key:generate

# Run Migration and seed 
# RUN php artisan migrate:fresh --seed

# Expose the port
EXPOSE 8070

# Start the server
CMD php artisan serve --host=0.0.0.0 --port=8070
