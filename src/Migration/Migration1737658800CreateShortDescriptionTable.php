<?php

declare(strict_types=1);

namespace HMnetShortDescription\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1737658800CreateShortDescriptionTable extends MigrationStep
{
	public function getCreationTimestamp(): int
	{
		return 1737658800;
	}

	public function update(Connection $connection): void
	{
		$connection->executeStatement(
			<<<'SQL'
CREATE TABLE IF NOT EXISTS `hmnet_short_description` (
    `id` BINARY(16) NOT NULL,
    `product_id` BINARY(16) NOT NULL,
    `product_version_id` BINARY(16) NOT NULL,
    `short_description` VARCHAR(1000) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `uniq.hmnet_short_description.product` 
        UNIQUE (`product_id`, `product_version_id`),
    CONSTRAINT `fk.hmnet_short_description.product_id` 
        FOREIGN KEY (`product_id`, `product_version_id`) 
        REFERENCES `product` (`id`, `version_id`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL
		);
	}

	public function updateDestructive(Connection $connection): void
	{
		// No destructive changes needed
	}
}
