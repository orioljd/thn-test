
# THN test by Oriol Jiménez

## Requirements

This test require php 8, a mySQL database created, and composer to install dependencies.

## Framework used and libraries
I used Slim framework I found it a good framework and have a DDD structure ready to use.

I use doctrine migrations to create all database necessary structure and data <https://www.doctrine-project.org/projects/doctrine-migrations/en/3.2/index.html>

## Installation

Clone this project via git.

Install dependencies:
```bash
composer install
```

configure .env file on app directory

Example on .env:
```
DB_DRIVER="pdo_mysql"
DB_HOST="localhost"
DB_PORT=3306
DB_DBNAME="thn"
DB_USER="root"
DB_PASSWORD=""
DB_CHARSET="utf8"
```

Then execute migrations, it creates all necessary tables on database, on the project directory execute:
```bash
php .\vendor\bin\doctrine-migrations migrations:migrate
```
It also inserts test data into the database to facilite your test. (normally this is not correct to do it on migrations)

## How to test

You can test it via browser

Example
```
http://thn-test.test/hotels/99c64e58-a418-493c-bad6-e5e983e1264c
```
where ```http://thn-test.test``` is the local domain and ``99c64e58-a418-493c-bad6-e5e983e1264c`` is the id of the hotel

Of course the id it's different of the generated in your DB, you can run:
```
http://thn-test.test/hotels
```
to get id's of the hotels
