<?php

declare(strict_types=1);

namespace HMnetShortDescription\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1769558400CreateShortDescriptionSchema extends MigrationStep
{
	public function getCreationTimestamp(): int
	{
		return 1769558400;
	}

	public function update(Connection $connection): void
	{
		$this->createShortDescriptionTable($connection);
		$this->createShortDescriptionTranslationTable($connection);
	}

	public function updateDestructive(Connection $connection): void
	{
		// No destructive changes for creation
	}

	private function createShortDescriptionTable(Connection $connection): void
	{
		$connection->executeStatement(
			<<<'SQL'
CREATE TABLE IF NOT EXISTS `hmnet_short_description` (
	`id` BINARY(16) NOT NULL,
	`product_id` BINARY(16) NOT NULL,
	`product_version_id` BINARY(16) NOT NULL,
	`created_at` DATETIME(3) NOT NULL,
	`updated_at` DATETIME(3) NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `uniq.hmnet_short_description.product` (`product_id`, `product_version_id`),
	CONSTRAINT `fk.hmnet_short_description.product`
		FOREIGN KEY (`product_id`, `product_version_id`)
		REFERENCES `product` (`id`, `version_id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
SQL
		);
	}

	private function createShortDescriptionTranslationTable(Connection $connection): void
	{
		$connection->executeStatement(
			<<<'SQL'
CREATE TABLE IF NOT EXISTS `hmnet_short_description_translation` (
	`hmnet_short_description_id` BINARY(16) NOT NULL,
	`language_id` BINARY(16) NOT NULL,
	`short_description` LONGTEXT NULL,
	`created_at` DATETIME(3) NOT NULL,
	`updated_at` DATETIME(3) NULL,
	PRIMARY KEY (`hmnet_short_description_id`, `language_id`),
	CONSTRAINT `fk.hmnet_short_description_translation.short_description_id`
		FOREIGN KEY (`hmnet_short_description_id`)
		REFERENCES `hmnet_short_description` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `fk.hmnet_short_description_translation.language_id`
		FOREIGN KEY (`language_id`)
		REFERENCES `language` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
SQL
		);
	}
}
