<?php
declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

const APP_ROOT = __DIR__;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true, // Should be set to false in production
                'logError'            => false,
                'logErrorDetails'     => false,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],
                'doctrine' => [
                    // if true, metadata caching is forcefully disabled
                    'dev_mode' => true,

                    // path where the compiled metadata info will be cached
                    // make sure the path exists and it is writable
                    'cache_dir' => APP_ROOT . '/var/doctrine',

                    // you should add any other path containing annotated entity classes
                    'metadata_dirs' => [APP_ROOT . '/src/Domain'],

                    'connection' => [
                        'driver' => getenv('DB_DRIVER'),
                        'host' => getenv('DB_HOST'),
                        'dbname' => getenv('DB_DBNAME'),
                        'user' => getenv('DB_USER'),
                        'password' => getenv('DB_PASSWORD'),
                        'port' => getenv('DB_PORT'),
                        'charset' => getenv('DB_CHARSET'),
                    ],
                ],
                "db" => [
                    'host' => getenv('DB_HOST'),
                    'database' => getenv('DB_DBNAME'),
                    'username' => getenv('DB_USER'),
                    'password' => getenv('DB_PASSWORD'),
                    'charset' => getenv('DB_CHARSET'),
                    'flags' => [
                        // Turn off persistent connections
                        PDO::ATTR_PERSISTENT => false,
                        // Enable exceptions
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        // Emulate prepared statements
                        PDO::ATTR_EMULATE_PREPARES => true,
                        // Set default fetch mode to array
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ],
                ],
            ]);
        }
    ]);
};
