<?php

namespace nooby\queuesystem\controller;

use pocketmine\player\Player;

interface Controller
{
  function add(): bool;

  function delete(): bool;

  function getAll(): array;
}
