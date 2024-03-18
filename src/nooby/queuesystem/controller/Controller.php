<?php

namespace nooby\queuesystem\controller;

use nooby\queuesystem\attribute\Queue;

interface Controller
{
    function add(string $id = "", Queue $queue = null, ...$options): string;

    function delete(string $id): bool;

    function get(string $id, array $options): ?Queue;

    function getAll(): array;
}