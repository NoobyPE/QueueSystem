<?php
declare(strict_types=1);

namespace nooby\queuesystem;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class QueueSystemLoader extends PluginBase
{
    use SingletonTrait;

    function onLoad(): void
    {
        self::setInstance($this);
    }
}