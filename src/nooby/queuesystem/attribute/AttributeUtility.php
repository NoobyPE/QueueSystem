<?php

namespace nooby\queuesystem\attribute;

interface AttributeUtility
{
    function __construct(string $id, array $options);

    function getId(): string;

<<<<<<< HEAD
    function getOptions();
}
=======
    function getOptionsByIdentifier(string $identifier): mixed;

    function getOptions(): array;
}
>>>>>>> d85d223024cc2675dbe875d082d8a9a35fad6277
