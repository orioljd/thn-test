<?php

namespace App\Application\ResponseData;

use App\Domain\Hotel\HotelNotFoundException;
use App\Domain\Hotel\HotelRepository;

class ResponseHotel
{

    public function __construct(
        private HotelRepository $hotelRepository,
        private HotelRegisteredRooms $hotelRegisteredRooms
    ) {}

    /**
     * @param string $hotelId
     * @throws HotelNotFoundException
     */
    public function __invoke(string $hotelId): array
    {
        return [
            'hotel_info' => $this->hotel($hotelId),
            'registered_rooms' => $this->hotelRegisteredRooms->__invoke($hotelId)
        ];
    }

    /**
     * @throws HotelNotFoundException
     */
    private function hotel(string $hotelId): array
    {
        $hotel = $this->hotelRepository->findHotelOfId($hotelId);
        return $hotel->jsonSerialize();
    }
}
