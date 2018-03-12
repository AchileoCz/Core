<?php

declare(strict_types=1);

namespace Napol;

use Napol\Command\Feed;
use Napol\Command\Heal;
use Napol\Command\Nick;
use Napol\Command\XYZ;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
class Main extends PluginBase {
   
    const PERM_RANK = "§f- §cคุณไม่สามารถใช้คำสั่งนี้ได้!";
    const PERM_STAFF = "§f- §cใช้ได้สำหรับแอดมินเท่านั้น!";
    const USE_IN_GAME = "§f- §cใช้คำสั่งในเกมเท่านั้น!";
   
    public function onEnable() {
        $this->getServer()->getCommandMap()->register("fly", new Fly($this));
        $this->getServer()->getCommandMap()->register("heal", new Heal($this));
        $this->getServer()->getCommandMap()->register("nick", new Nick($this));
        $this->getServer()->getCommandMap()->register("gm", new Gamemode($this));
        $this->getServer()->getCommandMap()->register("xyz", new XYZ($this));
        $this->getLogger()->info("====================");
        $this->getLogger()->info("§f- §aปลั๊กอิน §eCore§a ถูกเปิดใช้งานแล้ว!");
        $this->getLogger()->info("====================");
    }
}
