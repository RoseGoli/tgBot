<?php

namespace tgBot\TL\Methods;


use tgBot\Telegram;

/**
 * @class UnbanChatMember
 * @description Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
 *
 * @property int|string $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * @property int $user_id Unique identifier of the target user
 * @property bool $only_if_banned Do nothing if the user is not banned
 *
 *
 * @see https://api.telegram.org/bots/api#unbanchatmember
 */
class UnbanChatMember extends MethodDefinition implements MethodDefinitionInterface
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