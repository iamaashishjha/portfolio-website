
FROM php:7.4-apache
RUN apt-get update -y && apt-get install -y \
	git \
	curl \
	openssl \
	zip \
	unzip 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# RUN docker-php-ext-install \
# 	pdo mysql mbstring
# RUN docker-php-ext-install intl mysqli pdo pdo_mysql mbstring

# RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /app
COPY composer.json .
RUN composer install --no-scripts
COPY . /app

CMD php artisan serve --host=0.0.0.0 --port=80
# EXPOSE 8181