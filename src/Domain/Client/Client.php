<?php
declare(strict_types=1);

namespace App\Domain\Client;

use JsonSerializable;

class Client implements JsonSerializable
{
    public function __construct(private ?string $id, private string $name)
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
            'name' => $this->name
        ];
    }
}
