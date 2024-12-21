<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734783340CarColor extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734783340;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE car_color (
                id BINARY(16) NOT NULL, 
                car_color VARCHAR(255) NOT NULL, 
                created_at DATETIME NOT NULL, 
                updated_at DATETIME DEFAULT NULL, 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
