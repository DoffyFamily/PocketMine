<?php

declare(strict_types=1);

namespace firstplugin;

use pocketmine\plugin\PluginBase;

class FirstPlugin extends PluginBase{

    public function onEnable(): void {
        $this->getLogger()->info("Плагин успешно загружен");
    }

    public function onLoad(): void {
        $this->getLogger()->info("Плагин загружается");
    }

    public function onDisable(): void {
        $this->getLogger()->info("Плагин выключен");
    }

}

