<?php
declare(strict_types=1);

namespace nooby\queuesystem\controller;

use pocketmine\utils\SingletonTrait;

class QueueController
{
    use SingletonTrait;

    /**
     * @var array Queue[]
     */
    private array $QUEUES;
}