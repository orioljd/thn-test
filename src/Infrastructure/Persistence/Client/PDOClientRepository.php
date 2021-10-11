<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Client;

use App\Domain\Client\Client;
use App\Domain\Client\ClientNotFoundException;
use App\Domain\Client\ClientRepository;
use App\Infrastructure\Persistence\Shared\PDORepository;

class PDOClientRepository extends PDORepository implements ClientRepository
{
    /**
     * return Client[]
     */
    public function findAll(): array
    {
        $stm = $this->connection->prepare('SELECT * FROM clients');
        $stm->execute();

        $clients = [];
        $results = $stm->fetchAll();
        foreach ($results as $client) {
            $clients[] = new Client($client['id'], $client['name']);
        }

        return $clients;
    }

    /**
     * {@inheritdoc}
     */
    public function findClientOfId(string $id): Client
    {
        $stm = $this->connection->prepare('SELECT * FROM clients WHERE id = ?');
        $stm->execute([$id]);

        $client = $stm->fetch();

        if (!$client) {
            throw new ClientNotFoundException();
        }

        return new Client($client['id'], $client['name']);
    }
}
