<?php

declare(strict_types=1);

namespace HMnetShortDescription\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1769558401DropShortDescriptionSchema extends MigrationStep
{
	public function getCreationTimestamp(): int
	{
		return 1769558401;
	}

	public function update(Connection $connection): void
	{
		// This migration is for dropping schema, not creating
	}

	public function updateDestructive(Connection $connection): void
	{
		$this->drop($connection);
	}

	public function drop(Connection $connection): void
	{
		$connection->executeStatement('DROP TABLE IF EXISTS hmnet_short_description_translation');
		$connection->executeStatement('DROP TABLE IF EXISTS hmnet_short_description');
	}
}
