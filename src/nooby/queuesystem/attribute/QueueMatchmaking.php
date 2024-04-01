<?php

namespace nooby\queuesystem\attribute;

final class QueueMatchmaking
{
    /**
     * @var int $winner
     * @var int $losser
     * 
     * NOTE: return [16, -16] 
     */
    static function calculateEndingElo(int $winner, int $losser): array
    {
        if ($winner >= PHP_INT_MAX && $losser >= PHP_INT_MAX) {
            return [0, 0];
        }
        $scoreA = 1 / (1 + (pow(10, ($winner - $losser) / 408)));
        $scoreB = 1 / (1 + pow(10, ($losser - $winner) / 408));

        $winnerElo = $winner + intval(32 * (0 - $scoreA));
        $losserElo = $losser + intval(32 * (1 - $scoreB));
    
        return [
            $winner - $winnerElo,
            $losser - $losserElo
        ];
    }
}