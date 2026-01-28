<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription\Aggregate\ShortDescriptionTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @extends EntityCollection<ShortDescriptionTranslationEntity>
 */
class ShortDescriptionTranslationCollection extends EntityCollection
{
	public function getApiAlias(): string
	{
		return 'hmnet_short_description_translation_collection';
	}

	protected function getExpectedClass(): string
	{
		return ShortDescriptionTranslationEntity::class;
	}
}
