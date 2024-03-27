<?php
declare(strict_types=1);

namespace nooby\queuesystem\attribute;

use InvalidArgumentException;
use stdClass;

final class Queue implements AttributeUtility
{
    /** @var string */
    private string $id;

    /** @var Object */
    private object $options;

    /**
     * NOTE: $options data base
     *  - (array) players: almacena los jugadores ya sea uno o mas
     *  - (array) elo: el elo de cada jugador si es q existen mas
     *  - (bool) isPE: si solo empareja con gente de celular
     *  - (bool) ranked: si es competitivo o no
     *  - (bool) force: basicamente q empareje rapido (usuario pendejo)
     */
    function __construct(string $id, array $options)
    {
        $this->id = $id;
        if (empty($options)) {
            throw new InvalidArgumentException("\"$options\" is not empty");
        }
        $this->options = (object) $options;
    }

    function getId(): string
    {
        return $this->id;
    }

    function getOptions(): object
    {
        return $this->options;
    }

}