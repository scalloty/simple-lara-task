# Simple task with LARAVEL 9

1. Simple CRUD for product entity with relationship to colors.
2. Simple Administration for site navigation.
3. Registration user and login for admin navigation area.


## Config

Set credential for your database on `.env` file:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dbname
    DB_USERNAME=root
    DB_PASSWORD=12345

Installing dependencies:

    composer install

Create tables with dummy data:

    php artisan migrate --seed

## Run the app

    php artisan serve
