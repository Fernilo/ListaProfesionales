FROM php:7.1-apache

# Etiquetas de información
LABEL maintainer="fernan.alemercado@gmail.com"
LABEL version="1.0"
LABEL description="Imagen Docker para una aplicación PHP con Apache y MariaDB"

# Actualizar el repositorio e instalar las dependencias necesarias
RUN apt-get update && apt-get install -y \
    mariadb-server \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_mysql mysqli \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar el código fuente al contenedor
COPY . /var/www/html

# Exponer los puertos 80 (HTTP) y 3306 (MariaDB)
EXPOSE 80 3306

# Comando por defecto para ejecutar Apache y MariaDB
CMD ["sh", "-c", "service mysql start && apache2-foreground"]
