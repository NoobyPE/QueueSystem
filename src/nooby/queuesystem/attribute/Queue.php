<?php
declare(strict_types=1);

namespace nooby\queuesystem\attribute;

use InvalidArgumentException;

final class Queue implements AttributeUtility
{
    /** @var string */
    private string $id;

    /** @var array */
    private array $options;

    function __construct(string $id, ...$options)
    {
        $this->id = $id;
        if (empty($options)) {
            throw new InvalidArgumentException("\"$options\" is not empty");
        }
        $this->options = $options;
    }

    function getID(): string
    {
        return $this->id;
    }

    function getOptionsByIdentifier(string $identifier): mixed
    {
        return $this->options[$identifier]; 
    }

    function getOptions(): array
    {
        return $this->options;
    }

}