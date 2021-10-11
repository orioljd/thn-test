<?php
declare(strict_types=1);

use App\Domain\Hotel\HotelRepository;
use App\Domain\Client\ClientRepository;
use App\Domain\Reservation\ReservationRepository;
use App\Infrastructure\Persistence\Hotel\PDOHotelRepository;
use App\Infrastructure\Persistence\Client\PDOClientRepository;
use App\Infrastructure\Persistence\Reservation\PDOReservationRepository;

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        ClientRepository::class => \DI\autowire(PDOClientRepository::class),
        HotelRepository::class => \DI\autowire(PDOHotelRepository::class),
        ReservationRepository::class => \DI\autowire(PDOReservationRepository::class),
    ]);
};
