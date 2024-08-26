# Utiliser l'image officielle PHP avec Apache
FROM php:7.4-apache

# Installer les dépendances nécessaires pour pdo_pgsql
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copier le code source de l'application dans le conteneur
COPY . /var/www/html/

# Donner les permissions appropriées
RUN chown -R www-data:www-data /var/www/html/