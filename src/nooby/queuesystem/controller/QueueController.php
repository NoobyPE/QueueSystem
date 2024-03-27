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

    /**
     * USE: add($id, options: $array);
     * or: add(options: $array);
     */
    function add(string $id = "", Queue $queue = null, ...$options): string
    {
        if (isset($queue)) {
            $this->QUEUES[$queue->getId()] = $queue;
            return $queue->getId();
        }
        $id = $id === "" ? self::generateID() : $id;
        $queue = new Queue($id, $options);
        if (empty($this->QUEUES[$id])) {
            $this->QUEUES[$id] = $queue;
        }
        return $id;
    }

    function delete(string $id): bool
    {
        if (isset($this->QUEUES[$id])) {
            unset($this->QUEUES[$id]);
            return true;
        }
        return false;
    }

    function get(string $id, array $options): ?Queue
    {
        return $this->QUEUES[$id] ?? isset($options) ? new Queue(self::generateID(), $options) : null;
    }

    function getAll(): array
    {
        return $this->QUEUES;
    }
}
