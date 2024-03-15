<?php

namespace nooby\queuesystem\controller;

use pocketmine\player\Player;

interface Controller
{
    function add(string $id = null, ...$options): bool;

    function delete(string $id): bool;

    function getAll(): array;
}