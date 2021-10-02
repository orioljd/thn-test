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
                        'driver' => 'pdo_mysql',
                        'host' => 'localhost',
                        'port' => 3306,
                        'dbname' => 'thn-test',
                        'user' => 'root',
                        'password' => '',
                        'charset' => 'utf-8'
                    ]
                ],
            ]);
        }
    ]);
};
