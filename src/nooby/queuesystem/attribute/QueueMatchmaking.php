<?php

namespace nooby\queuesystem\attribute;

use stdClass;

final class QueueMatchmaking
{
    /**
     * @var int $winner
     * @var int $losser
     * 
     * NOTE: return [16, -16] 
     */
    static function calculateEndingElo(int $winner, int $losser): stdClass
    {
        if ($winner >= PHP_INT_MAX && $losser >= PHP_INT_MAX) {
            return [0, 0];
        }
        $scoreA = 1 / (1 + (pow(10, ($winner - $losser) / 408)));
        $scoreB = 1 / (1 + pow(10, ($losser - $winner) / 408));

        $winnerElo = $winner + intval(32 * (0 - $scoreA));
        $losserElo = $losser + intval(32 * (1 - $scoreB));

        $result = new stdClass();
        $result->winner = $winner - $winnerElo;
        $result->losser = $losser - $losserElo;
        return $result;
    }

    static function averageElo(Queue $queue): int
    {
        $elo = [];
        if (count($queue->getOptions()->elo) <=> count($queue->getOptions()->players)) {
            foreach($queue->getOptions()->elo as $name => $value) {
                array_merge($elo, $value);
            }
        }
        $total = 0;
        foreach($elo as $num) {
            $total = $total + $num;
        }
        $count = count($elo);
        return $total / $count;
    }

    static function searchByAverage(int $average): ?Queue
    {
        return null;
    }
}