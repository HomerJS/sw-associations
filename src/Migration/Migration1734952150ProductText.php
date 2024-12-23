<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734952150ProductText extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734952150;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE product_text (
                id BINARY(16) NOT NULL,
                product_version_id BINARY(16) DEFAULT NULL, 
                product_id BINARY(16) DEFAULT NULL,
                text VARCHAR(255) DEFAULT NULL, 
                created_at DATETIME NOT NULL, 
                updated_at DATETIME DEFAULT NULL, 
                PRIMARY KEY(id),
                CONSTRAINT `unique.product_text_extension.product` UNIQUE (`product_id`, `product_version_id`),
                CONSTRAINT `fk.product_text_extension.product_id` FOREIGN KEY (`product_id`, `product_version_id`) REFERENCES `product` (`id`, `version_id`) ON DELETE SET NULL ON UPDATE SET NULL 
            ) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
