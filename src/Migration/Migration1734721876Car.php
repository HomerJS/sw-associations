<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734721876Car extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734721876;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE car (
                id BINARY(16) NOT NULL, 
                name VARCHAR(255) NOT NULL,
                car_number_id BINARY(16) DEFAULT NULL UNIQUE,  
                created_at DATETIME NOT NULL, 
                updated_at DATETIME DEFAULT NULL, 
                PRIMARY KEY(id),
                CONSTRAINT `fk.car.car_number_id` FOREIGN KEY (`car_number_id`) REFERENCES `car_number` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
            ) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
