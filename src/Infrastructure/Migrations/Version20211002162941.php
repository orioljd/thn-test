<?php

declare(strict_types=1);

namespace App\Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211002162941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'users table creation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE `users` (
                    `id` VARCHAR(32) NOT NULL,
	                `name` VARCHAR(255) NOT NULL DEFAULT '',
	                PRIMARY KEY (id)
                ) COLLATE='utf8_general_ci'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `users`");
    }
}
