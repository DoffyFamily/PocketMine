<?php

declare(strict_types=1);

namespace doffy;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class MainClass extends PluginBase {

    public function onEnable() {
        $this->getLogger()->info("Плагин включен");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if($command->getName() == "first") {
            if(!($sender instanceof Player)){
                $sender->sendMessage("Ввод команды только в игре");
                return false;
            }
            if(!$sender->hasPermission("first.command")) {
                $sender->sendMessage("У Вас нет прав на использование команды");
                return false;
            }
            if(isset($args[0])){
                if($args[0] == "one") {
                    $sender->sendMessage("Команда /first one выполнена");
                }
            }else{
                $sender->sendMessage("Команда /first выполнена");
            }
        }
        return true;
    }
}
