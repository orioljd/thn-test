<?php
declare(strict_types=1);

namespace App\Domain\Hotel;

interface HotelRepository
{
    /**
     * @param string $id
     * @return Hotel
     * @throws HotelNotFoundException
     */
    public function findHotelOfId(string $id): Hotel;
}
