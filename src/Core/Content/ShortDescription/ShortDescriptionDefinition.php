<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription;

use HMnetShortDescription\Core\Content\ShortDescription\Aggregate\ShortDescriptionTranslation\ShortDescriptionTranslationDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ShortDescriptionDefinition extends EntityDefinition
{
	public const ENTITY_NAME = 'hmnet_short_description';

	public function getEntityName(): string
	{
		return self::ENTITY_NAME;
	}

	public function getEntityClass(): string
	{
		return ShortDescriptionEntity::class;
	}

	public function getCollectionClass(): string
	{
		return ShortDescriptionCollection::class;
	}

	public function getDefaults(): array
	{
		return [
			'productVersionId' => Defaults::LIVE_VERSION,
		];
	}

	protected function defineFields(): FieldCollection
	{
		return new FieldCollection([
			(new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required(), new ApiAware()),
			(new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new Required(), new ApiAware()),
			(new ReferenceVersionField(ProductDefinition::class, 'product_version_id'))->addFlags(new Required(), new ApiAware()),
			(new OneToOneAssociationField('product', 'product_id', 'id', ProductDefinition::class, false))
				->addFlags(new CascadeDelete()),
			(new TranslatedField('shortDescription'))->addFlags(new ApiAware()),
			(new TranslationsAssociationField(
				ShortDescriptionTranslationDefinition::class,
				'hmnet_short_description_id'
			))->addFlags(new Required(), new ApiAware()),
		]);
	}
}
