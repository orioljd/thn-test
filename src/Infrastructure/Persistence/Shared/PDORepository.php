<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Shared;

use \PDO;

abstract Class PDORepository
{
    /**
     * @var PDO
     */
    protected $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
       $this->connection = $connection;
    }
}
