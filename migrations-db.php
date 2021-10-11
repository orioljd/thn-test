<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable('app/');
$dotenv->load();

return [
    'dbname' => getenv('DB_DBNAME'),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
    'host' => getenv('DB_HOST'),
    'driver' => getenv('DB_DRIVER'),
];
