<?php

namespace core;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{
   
   public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getLogger()->info(TF::GREEN . "ปลั๊กอิน §eCore" . TF::GREEN ." ถูกเปิดใช้งานแล้ว"); 
      $this->Eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
   }else{
      $this->getLogger()->info(TextFormat::RED . "ไม่พบปลั๊กอิน EconomyAPI");
      $this->getPluginLoader()->disablePlugin($this);
   }
}
