<?php

declare(strict_types=1);

namespace HMnetShortDescription;

use Doctrine\DBAL\Connection;
use HMnetShortDescription\Migration\Migration1769558401DropShortDescriptionSchema;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

class HMnetShortDescription extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);

        if ($uninstallContext->keepUserData()) {
            return;
        }

        $this->dropSchema($uninstallContext);
    }

    public function update(UpdateContext $updateContext): void
    {
        parent::update($updateContext);
    }

    private function dropSchema(UninstallContext $uninstallContext): void
    {
        if ($uninstallContext->keepUserData() || $this->container === null) {
            return;
        }

        if (!$this->container->has(Connection::class)) {
            return;
        }

        $connection = $this->container->get(Connection::class);

        $migration = new Migration1769558401DropShortDescriptionSchema();
        $migration->drop($connection);
    }
}
