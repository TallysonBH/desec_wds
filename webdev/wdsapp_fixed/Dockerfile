# Usa a imagem oficial PHP 8.2 com Apache
FROM php:8.2-apache

# Habilita o módulo rewrite do Apache
RUN a2enmod rewrite

# Instala extensão mysqli e pdo_mysql para conectar ao MySQL
RUN apt-get update && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Habilita o handler de PHP para qualquer arquivo .php no DocumentRoot
RUN echo 'Alias /aula/desec_wds/webdev/wdsapp_fixed /var/www/html/aula/webdev/wdsapp_fixed\n\
<Directory "/var/www/html/aula/webdev/wdsapp_fixed">\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    <FilesMatch "\.php$">\n\
        SetHandler application/x-httpd-php\n\
    </FilesMatch>\n\
</Directory>' > /etc/apache2/conf-available/wdsapp.conf \
    && a2enconf wdsapp

# Expõe a porta 80
EXPOSE 80

# Inicia o Apache em primeiro plano
CMD ["apache2-foreground"]
