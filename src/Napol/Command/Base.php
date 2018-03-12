<?php

declare(strict_types=1);

namespace Napol\Command;
use Napol\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;

class Base extends Command implements PluginIdentifiableCommand {

    private $plugin;

    public function __construct(Main $plugin, $name, $description, $usageMessage, $aliases) {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->plugin = $plugin;
    }

    public function getPlugin(): Plugin {
        return $this->plugin;
    }

    public function execute(CommandSender $sender, $commandLabel, array $args): bool {
        if ($sender->hasPermission($this->getPermission())) {
            $result = $this->onExecute($sender, $args);
            if (is_string($result)) {
                $sender->sendMessage($result);
            }
            return true;
        } else {
            $sender->sendMessage("§cผิดพลาด§f -> §cไม่สามารถใช้คำสั่งนี้ได้!");
        }
        return false;
    }

}
