<?php

declare(strict_types=1);

namespace plugin;

use pocketmine\command\Command;

use pocketmine\event\Listener;

use pocketmine\utils\Config;

use pocketmine\command\CommandSender;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat;

class MainClass extends PluginBase{
	
	
	public function onLoad() : void{

		$this->getLogger()->info(TextFormat::WHITE . "Plugins load avec succès!");

	}

    public $myConfig;
	public function onEnable() : void{
		
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->myConfig = new Config($this->getDataFolder() . "config.yml", Config::YAML);
		$this->getLogger()->info(TextFormat::DARK_GREEN . "Plugin Activer avec succès !");

	}

	public function onDisable() : void{

		$this->getLogger()->info(TextFormat::DARK_RED . "Plugin désactivé avec succès!");

	}

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{

		switch($command->getName()){

			case "hub":

				$sender->transfer($this->getConfig()->get("server_ip"), $this->getConfig()->get("server_port"));
				return true;
			default:

				throw new \AssertionError("This line will never be executed");


		}

	}

}