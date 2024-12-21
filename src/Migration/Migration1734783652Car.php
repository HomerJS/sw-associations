<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1734783652Car extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734783652;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            ALTER TABLE `car` ADD `car_color_id` BINARY(16) DEFAULT NULL;
            ALTER TABLE `car` ADD CONSTRAINT `fk.car.car_color_id` FOREIGN KEY (`car_color_id`) REFERENCES `car_color` (`id`) ON UPDATE CASCADE ON DELETE SET NULL;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
