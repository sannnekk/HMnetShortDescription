<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @extends EntityCollection<ShortDescriptionEntity>
 */
class ShortDescriptionCollection extends EntityCollection
{
	public function getApiAlias(): string
	{
		return 'hmnet_short_description_collection';
	}

	protected function getExpectedClass(): string
	{
		return ShortDescriptionEntity::class;
	}
}
