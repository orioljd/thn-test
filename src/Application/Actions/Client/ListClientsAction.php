<?php
declare(strict_types=1);

namespace App\Application\Actions\Client;

use Psr\Http\Message\ResponseInterface as Response;

class ListClientsAction extends ClientAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $clients = $this->clientRepository->findAll();

        $this->logger->info("Clients list was viewed.");

        return $this->respondWithData($clients);
    }
}
