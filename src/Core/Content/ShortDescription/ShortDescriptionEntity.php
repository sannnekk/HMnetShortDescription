<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Entity as EntityAttribute;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Field;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\FieldType;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ForeignKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\OnDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ManyToOne;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\ReferenceVersion;
use Shopware\Core\Framework\DataAbstractionLayer\Attribute\Required;

#[EntityAttribute(
	name: ShortDescriptionEntity::ENTITY_NAME
)]
class ShortDescriptionEntity extends Entity
{
	public const ENTITY_NAME = 'hmnet_short_description';

	#[PrimaryKey]
	#[Field(type: FieldType::UUID, api: true)]
	public string $id;

	#[ForeignKey(entity: 'product', column: 'product_id', api: true)]
	public ?string $productId = null;

	#[ReferenceVersion(entity: 'product')]
	public ?string $productVersionId = null;

	#[Field(type: FieldType::TEXT, api: true)]
	public ?string $shortDescription = null;

	#[ManyToOne(
		entity: 'product',
		ref: 'id',
		onDelete: OnDelete::CASCADE
	)]
	public ?ProductEntity $product = null;
}
