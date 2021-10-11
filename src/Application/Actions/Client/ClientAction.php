<?php
declare(strict_types=1);

namespace App\Application\Actions\Client;

use App\Application\Actions\Action;
use App\Domain\Client\ClientRepository;
use Psr\Log\LoggerInterface;

abstract class ClientAction extends Action
{
    protected ClientRepository $clientRepository;

    /**
     * @param LoggerInterface $logger
     * @param ClientRepository $clientRepository
     */
    public function __construct(LoggerInterface $logger, ClientRepository $clientRepository) {
        parent::__construct($logger);
        $this->clientRepository = $clientRepository;
    }
}
