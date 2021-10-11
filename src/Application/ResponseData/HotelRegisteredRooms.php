<?php

namespace App\Application\ResponseData;

use App\Domain\Reservation\ReservationRepository;

class HotelRegisteredRooms
{

    public function __construct(private ReservationRepository $reservationRepository)
    {}

    public function __invoke(string $hotelId): array
    {
        $rows = $this->reservationRepository->findReservationsByHotelId($hotelId);
        $reservations = [];
        foreach ($rows as $item) {
            $reservations[] =
                [
                    'id' => $item['id'],
                    'date_of_entry' => $item['date_of_entry'],
                    'nights' => $item['nights'],
                    'adults' => $item['adults'],
                    'kids' => $item['kids'],
                    'room_info' => [
                        'id' => $item['room_id'],
                        'name' => $item['room_name'],
                        'location' => $item['room_location'],
                        'capacity' => $item ['room_capacity']
                    ],
                    'client_info' => [
                        'id' => $item['client_id'],
                        'name' => $item['client_name'],
                    ],
                ];
        }

        return $reservations;
    }

}
