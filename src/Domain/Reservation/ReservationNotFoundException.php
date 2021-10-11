<?php
declare(strict_types=1);

namespace App\Domain\Reservation;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ReservationNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The reservation you requested does not exist.';
}
