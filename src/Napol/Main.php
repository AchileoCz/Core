<?php

declare(strict_types=1);

namespace Napol;

use Napol\Command\FeedCommand;
use Napol\Command\HealCommand;
use Napol\Command\NickCommand;
use Napol\Command\XYZCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
class Main extends PluginBase {
   
    public function onEnable() {
        $this->getServer()->getCommandMap()->register("feed", new FeedCommand($this));
        $this->getServer()->getCommandMap()->register("heal", new HealCommand($this));
        $this->getServer()->getCommandMap()->register("nick", new NickCommand($this));
        $this->getServer()->getCommandMap()->register("gm", new GamemodeCommand($this));
        $this->getServer()->getCommandMap()->register("xyz", new XYZCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(($this->joinmessage = new JoinMessage($this)), $this);
        $this->getServer()->getPluginManager()->registerEvents(($this->jointitle = new JoinTitle($this)), $this);
        $this->getLogger()->info("====================");
        $this->getLogger()->info(C::WHITE."- ".C::GREEN."ปลั๊กอิน ".C::YELLOW."Core".C::GREEN." ถูกเปิดใช้งานแล้ว!");
        $this->getLogger()->info("====================");
    }
}
