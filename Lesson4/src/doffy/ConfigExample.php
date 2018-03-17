<?php

declare(strict_types=1);

namespace doffy;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class ConfigExample extends PluginBase {

    /** @var Config */
    public $config;

    public function onEnable(): void {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->saveResource("names.yml");
        $defaults = [
            "author" => "vk.com/doffy_pe",
            "commands" => [
                "/kill", "/ban", "/kick"
            ],
            "items" => [
                "id" => 1,
                "damage" => 0,
                "count" => 64
            ]
        ];

        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, $defaults);

        $this->test_1();
        $this->test_2();
        $this->test_3();
    }

    public function test_1(): void {
        $commands = $this->config->get('commands');
        $author = $this->config->get("author");
        $id = $this->config->getNested('items.id');
        $damage = $this->config->getNested('items.damage');
        $count = $this->config->getNested('items.count');

        $this->getLogger()->info("Автор: ".$author);
        $this->getLogger()->info("Команды: ".$commands[0].", ".$commands[1].", ".$commands[2]);
        $this->getLogger()->info("Предметы: ".$id.":".$damage.":".$count);
    }

    public function test_2(): void {
        $all = $this->config->getAll();

        $this->getLogger()->info("Автор: ".$all['author']);
        $this->getLogger()->info("Команды: ".$all['commands'][0].", ".$all['commands'][1].", ".$all['commands'][2]);
        $this->getLogger()->info("Предметы: ".$all['items']['id'].":".$all['items']['damage'].":".$all['items']['count']);
    }

    public function test_3(): void {
        $this->config->set('ключ', 'значение');
        $this->config->set('лист', ['какой-то текст', 'какая-то информация']);
        $this->config->set('массив', ['ключ' => 'значение', 'лист' => ['информация', 'еще информация']]);
        $this->config->save(true);
    }


}



