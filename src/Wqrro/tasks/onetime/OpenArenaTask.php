<?php

declare(strict_types=1);

namespace Wqrro\tasks\onetime;

use Wqrro\Core;
use pocketmine\level\Level;
use pocketmine\scheduler\Task;

class OpenArenaTask extends Task
{

    private $arena;

    public function __construct(Core $plugin, string $arena)
    {
        $this->plugin = $plugin;
        $this->arena = $arena;
    }

    public function onRun(int $currentTick): void
    {
        $this->plugin->getArenaHandler()->setArenaOpen($this->arena);
    }
}