<?php
declare(strict_types=1);

namespace App\Domain\Room;

use App\Domain\Hotel\Hotel;
use JsonSerializable;

class Room implements JsonSerializable
{

    public function __construct(
        private ?string $id,
        private Hotel $hotel,
        private string $name,
        private string $location,
        private int $capacity,
    )
    {}

    public function id(): ?string
    {
        return $this->id;
    }

    public function hotel(): Hotel
    {
        return $this->hotel;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function location(): string
    {
        return $this->location;
    }

    public function capacity(): int
    {
        return $this->capacity;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hotel' => $this->hotel,
            'location' => $this->location,
            'capacity' => $this->capacity,
        ];
    }
}
