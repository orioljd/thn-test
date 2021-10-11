<?php
declare(strict_types=1);

namespace App\Domain\Hotel;

use JsonSerializable;

class Hotel implements JsonSerializable
{

    public function __construct(private ?string $id, private string $name, private string $address, private int $stars)
    {}

    public function id(): ?string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'stars' => $this->stars,
        ];
    }
}
