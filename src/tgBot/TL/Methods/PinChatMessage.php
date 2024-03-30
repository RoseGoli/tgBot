<?php

namespace tgBot\TL\Methods;


use tgBot\Telegram;

/**
 * @class PinChatMessage
 * @description Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * @property int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int $message_id Identifier of a message to pin
 * @property bool $disable_notification Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
 *
 *
 * @see https://api.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessage extends MethodDefinition implements MethodDefinitionInterface
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