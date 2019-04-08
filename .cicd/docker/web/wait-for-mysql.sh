#!/bin/bash

set -e
set -x

host="$1"
shift
cmd="$@"

echo $host;

until mysql -h "$host" -u ${DB_USERNAME} ${DB_DATABASE} -e 'use anhduc'; do
  >&2 echo "MySQL is unavailable - sleeping"
  sleep 1
done

>&2 echo "Mysql is up - executing command"

php artisan key:generate
php artisan migrate:fresh -v
php artisan passport:install
php artisan db:seed
php artisan serve --host=0.0.0.0 --port=8000