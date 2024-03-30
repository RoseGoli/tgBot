<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\ChatAdministratorRights;

/**
 * @class GetMyDefaultAdministratorRights
 * @description Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
 *
 * @property bool $for_channels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
 *
 *
 * @see https://api.telegram.org/bots/api#getmydefaultadministratorrights
 */
class GetMyDefaultAdministratorRights extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'ChatAdministratorRights';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return ChatAdministratorRights
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}