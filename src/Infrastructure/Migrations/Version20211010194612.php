<?php

declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Ramsey\Uuid\Uuid;

final class Version20211010194612 extends AbstractMigration
{
    private array $hotels;
    private array $clients;
    private array $rooms;

    public function getDescription(): string
    {
        return 'Insert test rows to Data Base';
    }

    public function up(Schema $schema): void
    {
        $this->insertHotels();
        $this->insertClients();
        $this->insertRooms();
        $this->insertReservations();
    }

    private function insertHotels(): void
    {
        $this->hotels = [
            [Uuid::uuid4()->toString(), 'Grand Hotel', 'GH address', 5],
            [Uuid::uuid4()->toString(), 'Hostal Paquita', 'HP address', 1],
        ];
        foreach ($this->hotels as $item) {
            $this->addSql("INSERT INTO hotels values (?, ?, ?, ?)", $item);
        }
    }

    private function insertClients(): void
    {
        $this->clients = [
            [Uuid::uuid4()->toString(), 'Manuel Rodriguez'],
            [Uuid::uuid4()->toString(), 'Eulalia Fernandez'],
            [Uuid::uuid4()->toString(), 'Olga Lopez'],
        ];
        foreach ($this->clients as $item) {
            $this->addSql("INSERT INTO clients values (?, ?)", $item);
        }
    }

    private function insertRooms(): void
    {
        $this->rooms = [
            [Uuid::uuid4()->toString(), $this->hotels[0][0], 'Beach View', 'Building 1 - 122', 3],
            [Uuid::uuid4()->toString(), $this->hotels[1][0], 'Medium', '9', 3],
            [Uuid::uuid4()->toString(), $this->hotels[0][0], 'City view', 'Building 2 - 205', 2],
            [Uuid::uuid4()->toString(), $this->hotels[0][0], 'Very big', '10', 5],
            [Uuid::uuid4()->toString(), $this->hotels[1][0], 'Land view', 'Building 3 - 106', 4],
        ];
        foreach ($this->rooms as $item) {
            $this->addSql("INSERT INTO rooms values (?, ?, ?, ?, ?)", $item);
        }
    }

    private function insertReservations(): void
    {
        $reservations = [
            [Uuid::uuid4()->toString(), $this->clients[0][0], $this->rooms[0][0], 1 , 1, '2021-10-25', 5],
            [Uuid::uuid4()->toString(), $this->clients[2][0], $this->rooms[1][0], 2, 0, '2021-11-10', 7],
            [Uuid::uuid4()->toString(), $this->clients[1][0], $this->rooms[0][0], 2, 1, '2021-12-15', 3],
            [Uuid::uuid4()->toString(), $this->clients[0][0], $this->rooms[1][0], 1, 1, '2021-10-30', 2],
        ];
        foreach ($reservations as $item) {
            $this->addSql("INSERT INTO reservations values (?, ?, ?, ?, ?, ?, ?)", $item);
        }
    }

    public function down(Schema $schema): void
    {
        $this->addSql("TRUNCATE reservations");
        $this->addSql("TRUNCATE rooms");
        $this->addSql("TRUNCATE clients");
        $this->addSql("TRUNCATE hotels");
    }
}
