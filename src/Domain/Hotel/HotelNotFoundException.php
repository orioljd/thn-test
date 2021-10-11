<?php
declare(strict_types=1);

namespace App\Domain\Hotel;

use App\Domain\DomainException\DomainRecordNotFoundException;

class HotelNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The hotel you requested does not exist.';
}
