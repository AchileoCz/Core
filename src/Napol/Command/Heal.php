<?php

declare(strict_types=1);

namespace Napol\Command;

use Napol\Main;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Heal extends Base {
    private $plugin;
    public function __construct(Core $plugin) {
        $this->plugin = $plugin;
        parent::__construct($plugin, "heal", "Heal Yourself", "/heal", ["heal"]);
    }
    public function execute(CommandSender $sender, $commandLabel, array $args): bool {
        if ($sender instanceof Player) {
            if (!$sender->hasPermission("heal.cmd") {
                $sender->sendMessage(Core::PERM_RANK);
            } else {
                $player->heal(new EntityRegainHealthEvent($player, $player->getMaxHealth() - $player->getHealth(), EntityRegainHealthEvent::CAUSE_CUSTOM));
                $player->getLevel()->addParticle(new HeartParticle($player->add(0, 2), 4));
                $sender->setHealth(20);
                $sender->sendMessage("§f- §aคุณถูกเพิ่มเลือดแล้ว!");
            }
        } else {
            $sender->sendMessage(Core::USE_IN_GAME);
        }
        return true;
    }
}
