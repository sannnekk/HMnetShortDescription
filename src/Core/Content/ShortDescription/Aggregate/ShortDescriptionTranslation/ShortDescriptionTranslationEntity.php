<?php

declare(strict_types=1);

namespace HMnetShortDescription\Core\Content\ShortDescription\Aggregate\ShortDescriptionTranslation;

use HMnetShortDescription\Core\Content\ShortDescription\ShortDescriptionEntity;
use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class ShortDescriptionTranslationEntity extends TranslationEntity
{
	protected string $hmnetShortDescriptionId;

	protected ?ShortDescriptionEntity $hmnetShortDescription = null;

	protected ?string $shortDescription = null;

	public function getHmnetShortDescriptionId(): string
	{
		return $this->hmnetShortDescriptionId;
	}

	public function setHmnetShortDescriptionId(string $hmnetShortDescriptionId): void
	{
		$this->hmnetShortDescriptionId = $hmnetShortDescriptionId;
	}

	public function getHmnetShortDescription(): ?ShortDescriptionEntity
	{
		return $this->hmnetShortDescription;
	}

	public function setHmnetShortDescription(?ShortDescriptionEntity $hmnetShortDescription): void
	{
		$this->hmnetShortDescription = $hmnetShortDescription;
	}

	public function getShortDescription(): ?string
	{
		return $this->shortDescription;
	}

	public function setShortDescription(?string $shortDescription): void
	{
		$this->shortDescription = $shortDescription;
	}
}
