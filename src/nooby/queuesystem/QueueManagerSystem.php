<?php
declare(strict_types=1);

namespace nooby\queuesystem;

use nooby\queuesystem\attribute\Queue;
use nooby\queuesystem\controller\QueueController;

/**
 * NOTE: aqui gestiono funciones donde te devuelve la clase {@link Queue}
 */
class QueueManagerSystem
{
    function getQueueRandom(): ?Queue
    {
        $all = QueueController::getInstance()->getAll();
        if (($queue = $all[array_rand($all, 1)]) !== null) {
            return $queue;
        }
        return null;
    }

    /**
     * NOTE: true is yes, false is not
     * true: Ranked? yes
     * false: Ranked? NO
     */
    function getQueueByRanked(bool $value = false): ?Queue
    {
        $queues = array_filter(QueueController::getInstance()->getAll(), function(Queue $queue) use($value): bool {
            return $queue->getOptionsByIdentifier("ranked") === $value;
        });
        if (($queue = $queues[array_rand($queues, 1)]) !== null) {
            return $queue;
        }
        return null;
    }

    function getQueueByForced(): ?Queue
    {
        $queues = array_filter(QueueController::getInstance()->getAll(), function(Queue $queue): bool {
            return $queue->getOptionsByIdentifier("force") === true;
        });
        if (($queue = $queues[array_rand($queues, 1)]) !== null) {
            return $queue;
        }
        return null;
    }

}