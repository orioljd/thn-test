<?php
declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211002160717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'rooms table creation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE `rooms` (
                    `id` CHAR(36) NOT NULL,
	                `hotel_id` CHAR(36) NOT NULL,
	                `name` VARCHAR(255) NOT NULL DEFAULT '',
                    `location` TEXT(50) NOT NULL DEFAULT '',
	                `capacity` TINYINT(2) UNSIGNED NOT NULL DEFAULT 0,
	                PRIMARY KEY (id)
                ) COLLATE='utf8_general_ci'");

    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `rooms`");
    }
}
