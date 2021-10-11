<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Hotel;

use App\Domain\Hotel\Hotel;
use App\Domain\Hotel\HotelNotFoundException;
use App\Domain\Hotel\HotelRepository;
use App\Infrastructure\Persistence\Shared\PDORepository;

class PDOHotelRepository extends PDORepository implements HotelRepository
{

    /**
     * return Hotel[]
     */
    public function findAll(): array
    {
        $stm = $this->connection->prepare('SELECT * FROM hotels');
        $stm->execute();

        $hotels = [];
        $results = $stm->fetchAll();
        foreach ($results as $hotel) {
            $hotels[] = new Hotel($hotel['id'], $hotel['name'], $hotel['address'], (int) $hotel['stars']);
        }

        return $hotels;
    }

    /**
     * {@inheritdoc}
     */
    public function findHotelOfId(string $id): Hotel
    {
        $stm = $this->connection->prepare('SELECT * FROM hotels WHERE id = ?');
        $stm->execute([$id]);

        $hotel = $stm->fetch();

        if (!$hotel) {
            throw new HotelNotFoundException();
        }

        return new Hotel($hotel['id'], $hotel['name'], $hotel['address'], (int)$hotel['stars']);
    }
}
