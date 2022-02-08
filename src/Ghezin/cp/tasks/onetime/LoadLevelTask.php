<?php

declare(strict_types=1);

namespace Ghezin\cp\tasks\onetime;

use Ghezin\cp\Core;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class LoadLevelTask extends Task
{

    private $level;

    public function __construct(Core $plugin, string $level)
    {
        $this->plugin = $plugin;
        $this->level = $level;
    }

    public function onRun(int $currentTick): void
    {
        if (Server::getInstance()->isLevelLoaded($this->level)) return;
        Server::getInstance()->loadLevel($this->level);
    }
}