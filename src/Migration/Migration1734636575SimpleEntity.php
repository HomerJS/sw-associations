<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1734636575SimpleEntity extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734636575;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            ALTER TABLE `simple_entity` ADD `simple2_entity_id` BINARY(16) DEFAULT NULL UNIQUE ;
            ALTER TABLE `simple_entity` ADD CONSTRAINT `fk.simple_entity.simple2_entity_id` FOREIGN KEY (`simple2_entity_id`) REFERENCES `simple2_entity` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
