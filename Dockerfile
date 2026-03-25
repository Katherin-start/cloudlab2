#vamos a usar una imagen  base de php 

FROM php:8.1-apache

#instalamos las dependencias necesarias para conectar con postgres y para usar PDO
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

#ahora coíamos el contenido de mi app al container 
COPY . /var/www/html/

#exponiendo el puerto 80
EXPOSE 80