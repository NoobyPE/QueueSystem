<?php
declare(strict_types=1);

namespace nooby\queuesystem\controller;

use nooby\queuesystem\attribute\Queue;
use pocketmine\utils\SingletonTrait;

class QueueController implements Controller
{
    use SingletonTrait;

    /**
     * @var array Queue[]
     */
    private array $QUEUES;

    static function generateID(): string
    {
        return bin2hex(random_bytes(5));
    }

    function add(string $id = null, ...$options): bool
    {
        $id = $id === null ? self::generateID() : $id;
        $queue = new Queue($id, $options);
        if (empty($this->QUEUES[$id])) {
            $this->QUEUES[$id] = $queue;
            return true;
        } else {
            $this->QUEUES[$id] = $queue;
            return true;
        }
        return false;
    }

    function delete(string $id): bool
    {
        if (isset($this->QUEUES[$id])) {
            unset($this->QUEUES[$id]);
            return true;
        }
        return false;
    }

    function getAll(): array
    {
        return $this->QUEUES;
    }
}