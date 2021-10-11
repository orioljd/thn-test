<?php
declare(strict_types=1);

namespace App\Domain\Reservation;

interface ReservationRepository
{
    public function findReservationsByHotelId(string $id): array;
}
