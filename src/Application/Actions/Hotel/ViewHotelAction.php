<?php
declare(strict_types=1);

namespace App\Application\Actions\Hotel;

use App\Application\Actions\Action;
use App\Application\ResponseData\ResponseHotel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class ViewHotelAction extends Action
{
    public function __construct(LoggerInterface $logger, private ResponseHotel $responseHotel)
    {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $hotelId = $this->resolveArg('id');

        $response = $this->responseHotel->__invoke($hotelId);

        $this->logger->info("Hotel of id `${hotelId}` was viewed.");

        return $this->respondWithData($response);
    }
}
