<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734721658CarNumber extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734721658;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE car_number (
                id BINARY(16) NOT NULL, 
                car_number VARCHAR(255) NOT NULL, 
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
