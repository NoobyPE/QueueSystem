<?php

namespace nooby\queuesystem\attribute;

use pocketmine\player\Player;

interface AttributeUtility
{
    function add(Player $player): bool;

    function delete(Player $player): bool;

    function getAll(): array;
}