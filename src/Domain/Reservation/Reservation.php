<?php
declare(strict_types=1);

namespace App\Domain\Reservation;

use App\Domain\Client\Client;
use App\Domain\Room\Room;
use JsonSerializable;
use \DateTime;

class Reservation implements JsonSerializable
{
    public function __construct(
        private ?string $id,
        private Client $client,
        private Room $room,
        private int $adults,
        private int $kids,
        private DateTime $dateOfEntry,
        private int $nights,
    )
    {}

    public function id(): ?string
    {
        return $this->id;
    }

    public function client(): Client
    {
        return $this->client;
    }
    public function room(): Room
    {
        return $this->room;
    }
    public function adults(): int
    {
        return $this->adults;
    }
    public function kids(): int
    {
        return $this->kids;
    }
    public function dateOfEntry(): DateTime
    {
        return $this->dateOfEntry;
    }
    public function nights(): int
    {
        return $this->nights;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'client' => $this->client,
            'room' => $this->room,
            'adults' => $this->adults,
            'kids' => $this->kids,
            'date_of_entry' => $this->dateOfEntry,
            'nights' => $this->nights,
        ];
    }
}
