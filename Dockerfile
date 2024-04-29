FROM php:8.2.12

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app/backend
COPY . .
RUN composer install
RUN apt-get update
RUN apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli pdo_mysql

EXPOSE 3001

COPY /db_wait.sh /usr/bin/
RUN chmod +x /usr/bin/db_wait.sh

ENTRYPOINT ["db_wait.sh"]
