# Use the official PHP image as the base image
FROM php:7.4-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the PHP files from your host machine to the container
COPY . .

# Expose port 80 to allow external access to your application
EXPOSE 80
