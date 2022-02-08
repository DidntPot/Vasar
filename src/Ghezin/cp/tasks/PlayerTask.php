<?php

declare(strict_types=1);

namespace Ghezin\cp\tasks;

use Ghezin\cp\Core;
use Ghezin\cp\CPlayer;
use pocketmine\scheduler\Task;

class PlayerTask extends Task
{

    public function __construct(Core $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onRun(int $tick): void
    {
        $players = $this->plugin->getServer()->getLoggedInPlayers();
        foreach ($players as $player) {
            if ($player instanceof CPlayer) {
                $player->update();
            }
        }
    }
}