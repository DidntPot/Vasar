<?php

declare(strict_types=1);

namespace Wqrro\tasks\onetime;

use Wqrro\Core;
use pocketmine\Player;
use pocketmine\scheduler\Task;

class ChatCooldownTask extends Task
{

    public $player;

    private $timer = 4;

    public function __construct(Core $plugin, Player $player)
    {
        $this->plugin = $plugin;
        $this->player = $player;
    }

    public function onRun(int $currentTick): void
    {
        $this->timer--;
        switch ($this->timer) {
            case 3:
                $this->player->setChatCooldown(true);
                break;
            case 0:
                $this->player->setChatCooldown(false);
                $this->plugin->getScheduler()->cancelTask($this->getTaskId());
                break;
        }
    }
}