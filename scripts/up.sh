#!/bin/bash

echo "composer"
docker-compose exec laravel.test composer install

echo "migrations"
docker-compose exec laravel.test php artisan migrate:fresh

echo "users seed"
docker-compose exec laravel.test php artisan db:seed --class=UserSeeder

echo "users elasticsearch indexing"
docker-compose exec laravel.test php artisan elastic:users
