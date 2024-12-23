<?php declare(strict_types=1);

namespace IhorAss\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1734961600ProductManuf extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1734961600;
    }

    public function update(Connection $connection): void
    {
        $query = <<<'SQL'
            CREATE TABLE manuf_product (
                product_version_id BINARY(16) NOT NULL,
                product_id BINARY(16) NOT NULL, 
                manuf_id BINARY(16) NOT NULL, 
                created_at DATETIME NOT NULL, 
                updated_at DATETIME DEFAULT NULL, 
                PRIMARY KEY(product_version_id, product_id, manuf_id),
                KEY `fk.manuf_product.manuf_id` (`manuf_id`),
                KEY `fk.manuf_product.product_id` (`product_id`,`product_version_id`),
                CONSTRAINT `fk.manuf_product.manuf_id` FOREIGN KEY (`manuf_id`) REFERENCES `manuf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.manuf_product.product_id` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // Add destructive update if necessary
    }
}
