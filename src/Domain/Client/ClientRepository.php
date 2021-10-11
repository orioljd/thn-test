<?php
declare(strict_types=1);

namespace App\Domain\Client;

interface ClientRepository
{
    /**
     * @return Client[]
     */
    public function findAll(): array;

    /**
     * @param string $id
     * @return Client
     * @throws ClientNotFoundException
     */
    public function findClientOfId(string $id): Client;
}
