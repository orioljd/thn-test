<?php
declare(strict_types=1);

namespace App\Application\Actions\Hotel;

use Psr\Http\Message\ResponseInterface as Response;

class ListHotelsAction extends HotelAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $clients = $this->clientRepository->findAll();

        $this->logger->info("Hotels list was viewed.");

        return $this->respondWithData($clients);
    }
}
