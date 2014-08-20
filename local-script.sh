#!/usr/bin/env bash

echo ">>> Running setup for Starter Site"
echo ">>>> Creating Laravel Database"

[[ -z $1 ]] && { echo "!!! MariaDB root password not set. Check the Vagrant file."; exit 1; }

MYSQL=`which mysql`
$MYSQL -uroot -p$1 -e "create database laravel;"

echo ">>>> Running migrations and seeders"

cd /vagrant

php artisan migrate
php artisan db:seed

echo ">>>> Creating secret key"
php artisan key:generate
