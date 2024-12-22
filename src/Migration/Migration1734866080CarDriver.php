<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734866080CarDriver extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734866080;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE `car_driver` (
                `car_id` BINARY(16) NOT NULL,
                `driver_id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`car_id`,`driver_id`),
                KEY `fk.car_driver.car_id` (`car_id`),
                KEY `fk.car_driver.driver_id` (`driver_id`),
                CONSTRAINT `fk.car_driver.car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.car_driver.driver_id` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
