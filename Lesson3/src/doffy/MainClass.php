<?php

declare(strict_types=1);

namespace doffy;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

class MainClass extends PluginBase implements Listener{

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function interact(PlayerInteractEvent $event): void{
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $item = $event->getItem();
        $action = $event->getAction();

        if($action == PlayerInteractEvent::RIGHT_CLICK_BLOCK){
            $player->sendMessage("Тап правой рукой по блоку");
        }
        if($item->getId() == 1){
            $player->sendMessage("Там предметом с  id = 1");
        }
        if($block->getId() == 4){
            $player->sendMessage("Тап по предмету с id = 4");
        }
    }

}

