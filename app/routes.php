<?php
declare(strict_types=1);

use App\Application\Actions\Client\ListClientsAction;
use App\Application\Actions\Client\ViewClientAction;
use App\Application\Actions\Hotel\ListHotelsAction;
use App\Application\Actions\Hotel\ViewHotelAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/clients', function (Group $group) {
        $group->get('', ListClientsAction::class);
        $group->get('/{id}', ViewClientAction::class);
    });

    $app->group('/hotels', function (Group $group) {
        $group->get('', ListHotelsAction::class);
        $group->get('/{id}', ViewHotelAction::class);
    });
};
