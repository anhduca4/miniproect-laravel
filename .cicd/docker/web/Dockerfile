FROM lorisleiva/laravel-docker:7.2

WORKDIR /app
COPY . .

RUN cp -rf .env.docker .env
# RUN echo '' > .env
RUN composer global require phpunit/phpunit ^7.5

RUN composer install
RUN php artisan config:cache

RUN ["chmod", "+x", "./.cicd/docker/web/wait-for-mysql.sh"]
CMD ["./.cicd/docker/web/wait-for-mysql.sh", "mysql", "php artisan serve --host=0.0.0.0 --port=8000"]
EXPOSE 8000
