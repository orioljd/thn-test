<?php
declare(strict_types=1);

namespace App\Application\Actions\Hotel;

use App\Application\Actions\Action;
use App\Domain\Hotel\HotelRepository;
use Psr\Log\LoggerInterface;

abstract class HotelAction extends Action
{
    protected HotelRepository $clientRepository;

    /**
     * @param LoggerInterface $logger
     * @param HotelRepository $clientRepository
     */
    public function __construct(LoggerInterface $logger, HotelRepository $clientRepository) {
        parent::__construct($logger);
        $this->clientRepository = $clientRepository;
    }
}
