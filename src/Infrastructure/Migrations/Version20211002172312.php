<?php

declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211002172312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'reservations table creation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "CREATE TABLE `reservations` (
                    `id` VARCHAR(32) NOT NULL,
	                `user_id` VARCHAR(32) NOT NULL,
                    `room_id` VARCHAR(32) NOT NULL,
                    `adults` TINYINT(2) UNSIGNED NOT NULL DEFAULT 0,
                    `kids` TINYINT(2) UNSIGNED NOT NULL DEFAULT 0,
	                PRIMARY KEY (id)
                ) COLLATE='utf8_general_ci'"
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `reservations`");
    }
}
