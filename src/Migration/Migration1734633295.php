<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734633295 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734633295;
    }

    public function update(Connection $connection): void
    {
        $this->createEntity($connection);
        $this->createTranslation($connection);
    }

    private function createEntity(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE `simple2_entity` (
                `id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($query);
    }

    private function createTranslation(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE `simple2_entity_translation` (
                `simple2_entity_id` BINARY(16) NOT NULL,
                `language_id` BINARY(16) NOT NULL,
                `simple2_name` VARCHAR(255) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`simple2_entity_id`,`language_id`),
                KEY `fk.simple2_entity_translation.simple2_entity_id` (`simple2_entity_id`),
                KEY `fk.simple2_entity_translation.language_id` (`language_id`),
                CONSTRAINT `fk.simple2_entity_translation.simple2_entity_id` FOREIGN KEY (`simple2_entity_id`) REFERENCES `simple2_entity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.simple2_entity_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($query);
    }
}
