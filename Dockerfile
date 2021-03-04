FROM php:8.0-apache

# Apache conf
# allow .htaccess with RewriteEngine
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
