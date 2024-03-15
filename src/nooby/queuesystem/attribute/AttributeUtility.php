<?php

namespace nooby\queuesystem\attribute;

interface AttributeUtility
{
    function __construct(string $id, ...$options);

    function getID(): string;

    function getOptionsByIdentifier(string $identifier): mixed;

    function getOptions(): array;
}