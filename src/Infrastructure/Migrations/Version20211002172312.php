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
        $this->addSql("CREATE TABLE `reservations` (
                    `id` CHAR(36) NOT NULL COLLATE 'utf8_general_ci',
                    `client_id` CHAR(36) NOT NULL COLLATE 'utf8_general_ci',
                    `room_id` CHAR(36) NOT NULL COLLATE 'utf8_general_ci',
                    `adults` TINYINT(2) UNSIGNED NOT NULL DEFAULT '0',
                    `kids` TINYINT(2) UNSIGNED NOT NULL DEFAULT '0',
                    `date_of_entry` DATE NOT NULL,
                    `nights` TINYINT NOT NULL DEFAULT 0,
                    PRIMARY KEY (`id`) USING BTREE
                )
                COLLATE='utf8_general_ci'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `reservations`");
    }
}
