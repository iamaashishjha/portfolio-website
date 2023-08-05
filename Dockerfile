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
# RUN php artisan migrate:refresh --seed --host=database
# RUN php artisan migrate:fresh --seed --host=database
# RUN php artisan migrate:fresh --seed

# Expose the port
EXPOSE 8080

# Start the server
CMD php artisan serve --host=0.0.0.0 --port=8080

# # Copy the wait-for-it script to the container
# COPY wait-for-it.sh /usr/local/bin/wait-for-it
# RUN chmod +x /usr/local/bin/wait-for-it

# # Wait for the database to become available before running migrations
# CMD wait-for-it portfolio_website_db:3306 -t 60 -- php artisan migrate:fresh --seed --host=database && php artisan serve --host=0.0.0.0 --port=8080
