<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription;

use HMnetShortDescription\Core\Content\ShortDescription\Aggregate\ShortDescriptionTranslation\ShortDescriptionTranslationCollection;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ShortDescriptionEntity extends Entity
{
	use EntityIdTrait;

	protected ?string $productId = null;

	protected ?string $productVersionId = null;

	protected ?string $shortDescription = null;

	protected ?ProductEntity $product = null;

	protected ?ShortDescriptionTranslationCollection $translations = null;

	public function getProductId(): ?string
	{
		return $this->productId;
	}

	public function setProductId(?string $productId): void
	{
		$this->productId = $productId;
	}

	public function getProductVersionId(): ?string
	{
		return $this->productVersionId;
	}

	public function setProductVersionId(?string $productVersionId): void
	{
		$this->productVersionId = $productVersionId;
	}

	public function getShortDescription(): ?string
	{
		return $this->shortDescription;
	}

	public function setShortDescription(?string $shortDescription): void
	{
		$this->shortDescription = $shortDescription;
	}

	public function getProduct(): ?ProductEntity
	{
		return $this->product;
	}

	public function setProduct(?ProductEntity $product): void
	{
		$this->product = $product;
	}

	public function getTranslations(): ?ShortDescriptionTranslationCollection
	{
		return $this->translations;
	}

	public function setTranslations(?ShortDescriptionTranslationCollection $translations): void
	{
		$this->translations = $translations;
	}
}
