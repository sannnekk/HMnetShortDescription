<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription\Aggregate\ShortDescriptionTranslation;

use HMnetShortDescription\Core\Content\ShortDescription\ShortDescriptionDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ShortDescriptionTranslationDefinition extends EntityTranslationDefinition
{
	public const ENTITY_NAME = 'hmnet_short_description_translation';

	public function getEntityName(): string
	{
		return self::ENTITY_NAME;
	}

	public function getParentDefinitionClass(): string
	{
		return ShortDescriptionDefinition::class;
	}

	public function getEntityClass(): string
	{
		return ShortDescriptionTranslationEntity::class;
	}

	public function getCollectionClass(): string
	{
		return ShortDescriptionTranslationCollection::class;
	}

	protected function defineFields(): FieldCollection
	{
		return new FieldCollection([
			(new LongTextField('short_description', 'shortDescription'))->addFlags(new ApiAware()),
		]);
	}
}
