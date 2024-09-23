# Use the official PHP image with Apache
FROM php:8.1-apache

# Install necessary dependencies for Laravel and PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel application code to the container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
