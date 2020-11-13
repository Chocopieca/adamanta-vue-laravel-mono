#!/bin/bash

composer install
php artisan module:migrate --force
php artisan cache:clear
php artisan optimize

