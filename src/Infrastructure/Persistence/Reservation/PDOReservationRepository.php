<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Reservation;

use App\Domain\Reservation\ReservationRepository;
use App\Infrastructure\Persistence\Shared\PDORepository;
use PDO;

class PDOReservationRepository extends PDORepository implements ReservationRepository
{
    public function findReservationsByHotelId(string $id): array
    {
        $stm = $this->connection->prepare(
        'SELECT res.id, res.date_of_entry, res.nights, res.kids, res.adults,
                rooms.id AS room_id, rooms.name AS room_name, rooms.capacity AS room_capacity, rooms.location AS room_location,
                clients.id AS client_id, clients.name AS client_name
                FROM reservations res
                INNER JOIN rooms ON rooms.id = res.room_id
                INNER JOIN clients ON clients.id = res.client_id
                WHERE rooms.hotel_id = ?
                ORDER BY res.date_of_entry'
        );
        $stm->execute([$id]);

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
