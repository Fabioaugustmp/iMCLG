# Dockerfile for Laravel Application

# Use the official PHP image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files before changing ownership
COPY . /var/www

# Fix git dubious ownership error (system-wide, as root)
RUN git config --system --add safe.directory /var/www

# Change ownership of the application files
RUN chown -R www-data:www-data /var/www

# Switch to the application user
USER www-data

# Now run composer install as the correct user with correct permissions
RUN composer install --no-dev --no-scripts --optimize-autoloader

# Create .env file and generate application key
RUN cp .env.example .env
RUN php artisan key:generate

# Run the post-autoload-dump scripts now that the key exists
RUN composer run-script post-autoload-dump

# Clear caches
RUN php artisan cache:clear
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Create the storage link
RUN php artisan storage:link

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
