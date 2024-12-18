<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734550635SimpleEntity extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734550635;
    }

    public function update(Connection $connection): void
    {
        $this->createEntity($connection);
        $this->createTranslation($connection);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }

    private function createEntity(Connection $connection): void
    {
        $query = <<<'SQL'
           CREATE TABLE `simple_entity` (
                `id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`),
                CONSTRAINT `json.simple_entity.translated` CHECK (JSON_VALID(`translated`))
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($query);
    }

    private function createTranslation(Connection $connection): void
    {
        $query = <<<'SQL'
        CREATE TABLE `simple_entity_translation` (
                `simple_entity_id` BINARY(16) NOT NULL,
                `simple_name` VARCHAR(255) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                `language_id` BINARY(16) NOT NULL,
                PRIMARY KEY (`simple_entity_id`,`language_id`),
                KEY `fk.simple_entity_translation.simple_entity_id` (`simple_entity_id`),
                KEY `fk.simple_entity_translation.language_id` (`language_id`),
                CONSTRAINT `fk.simple_entity_translation.simple_entity_id` FOREIGN KEY (`simple_entity_id`) REFERENCES `simple_entity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.simple_entity_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($query);
    }
}
