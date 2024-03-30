<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;

interface MethodDefinitionInterface
{
    public function __invoke(Telegram $telegram);
}