<?php
declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211002112245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'hotels table creation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "CREATE TABLE `hotels` (
                    `id` CHAR(36) NOT NULL,
	                `name` VARCHAR(255) NOT NULL DEFAULT '',
                    `address` TEXT(255) NOT NULL DEFAULT '',
	                `stars` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
	                PRIMARY KEY (id)
                ) COLLATE='utf8_general_ci'"
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `hotels`");
    }
}
