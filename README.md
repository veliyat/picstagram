# picstagram
This is an instagram clone built in Laravel and using MySQL as the Db

# DB Related Info
Create a database in mysql
Copy the .env.example file to .env file and add the DB related info

# Prerequisite
php 7.1+ (https://www.apachefriends.org/download.html)
composer (https://getcomposer.org/)

# Steps to run: This happens inside your Laravel App Folder

# Add Composer Dependencies
> composer install

# Add the laravel app key
> php artisan key:generate

# Reload the cache
> php artisan config:cache

# Set the default String Length (Coding to be done)
https://laravel.com/docs/master/migrations#indexes

# Seed the DB
> php artisan migrate --seed

# Serve the App
> php artisan serve
