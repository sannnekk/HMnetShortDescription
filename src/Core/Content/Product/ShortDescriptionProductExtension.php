<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\Product;

use HMnetShortDescription\Core\Content\ShortDescription\ShortDescriptionEntity;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ShortDescriptionProductExtension extends EntityExtension
{
	public function getDefinitionClass(): string
	{
		return ProductDefinition::class;
	}

	public function getEntityName(): string
	{
		return ProductDefinition::ENTITY_NAME;
	}

	public function extendFields(FieldCollection $collection): void
	{
		$collection->add(
			(new OneToOneAssociationField(
				'hmnetShortDescription',
				'id',
				'product_id',
				ShortDescriptionEntity::ENTITY_NAME,
				true
			))->addFlags(new CascadeDelete())
		);
	}
}
