<?php

namespace nooby\queuesystem\attribute;

interface AttributeUtility
{
    function __construct(string $id, array $options);

    function getId(): string;

    function getOptions();
}