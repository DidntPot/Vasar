<?php

declare(strict_types=1);

namespace Ghezin\cp\tasks;

use Ghezin\cp\Core;
use pocketmine\scheduler\Task;

class PingTask extends Task
{

    public function __construct(Core $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onRun(int $tick): void
    {
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $online) {
            $this->plugin->getScoreboardHandler()->updateMainLinePing($online);
        }
    }
}