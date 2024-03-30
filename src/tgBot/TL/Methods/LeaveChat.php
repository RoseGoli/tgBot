<?php

namespace tgBot\TL\Methods;


use tgBot\Telegram;

/**
 * @class LeaveChat
 * @description Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 *
 * @property int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 *
 * @see https://api.telegram.org/bots/api#leavechat
 */
class LeaveChat extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'bool';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return bool
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}