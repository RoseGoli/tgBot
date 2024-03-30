<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\InlineKeyboardMarkup;
use tgBot\TL\Types\Message;

/**
 * @class EditMessageReplyMarkup
 * @description Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 *
 * @property int|string $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int $message_id Required if inline_message_id is not specified. Identifier of the message to edit
 * @property string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard.
 *
 *
 * @see https://api.telegram.org/bots/api#editmessagereplymarkup
 */
class EditMessageReplyMarkup extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'Message';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return Message|bool
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}