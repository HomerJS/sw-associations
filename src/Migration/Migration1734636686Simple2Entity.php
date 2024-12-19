<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1734636686Simple2Entity extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734636686;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            ALTER TABLE `simple2_entity` ADD `simple_entity_id` BINARY(16) DEFAULT NULL;
            ALTER TABLE `simple2_entity` ADD CONSTRAINT `fk.simple2_entity.simple_entity_id` FOREIGN KEY (`simple_entity_id`) REFERENCES `simple_entity` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
