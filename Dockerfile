# FROM php:7.4-fpm
FROM php:8.1-rc-fpm-alpine3.16

# COPY index.php /var/www/html/
COPY --chmod=0440 --chown=www-data:www-data index.php /var/www/html/

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
