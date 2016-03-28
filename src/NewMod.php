<?php

namespace NewMod;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class NewMod extends PluginBase {
	public function onLoad(){
		$this->getLogger()->info(TextFormat::AQUA . TextFormat::BOLD . "NewMod by coolgamer564 is a plugin that helps you keep track of all players and what their status is!");
	}
	public function onEnable(){
		
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		if(($cmd->getname()== 'checkop')){
	 		
			if(count($args) === 1){
	 			$name = $args[0];
	 			$targetPlayer = $this->getServer()->getPlayer($name);
	 			if($targetPlayer instanceof Player){
	 				if($targetPlayer->isOp()){
	 					$sender->sendMessage($args[0] . " is OP!" );
	 				}
	 				else{
	 					$sender->sendMessage($args[0] . " is not OP. :(");
	 				}
	 			}
	 			else{
	 				$sender->sendMessage($args[0] . " is not online");
	 			}
	 		}
	 		else{
	 			$sender->sendMessage("Usage: /checkop <player>");
	 		}
	 		return true;
	 	}
	 	if($cmd->getName() == 'checkgm'){
	 		if(count($args) ==  1){
	 			$name = $args[0];
	 			$targetPlayer = $this->getServer()->getPlayer($name);
	 			$game = $targetPlayer->getGamemode();
	 			if($game == 1){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "creative!");
	 				return true;
	 			}
	 			if($game == 0){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "survival!");
	 				return true;
	 			}
	 			if($game == 2){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "Adventure Mode! Wow!");
	 				return true;
	 			}
	 			elseif($game == 3){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "Spectator Mode. Hmm...");
	 				return true;
	 			}
	 			else{
	 				$sender->sendMessage(TextFormat::RED . $args[0] . " is not online!");
	 			}
	 		}
	 	    else {
	 			$sender->sendMessage(TextFormat::RED . "Usage: /checkgm <player>");
	 			return true;
	 	    }
	 	}
	}
 }
