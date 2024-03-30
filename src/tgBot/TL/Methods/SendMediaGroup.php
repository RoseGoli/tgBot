<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\Message;

/**
 * @class SendMediaGroup
 * @description Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Messages that were sent is returned.
 *
 * @property int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo[] $media A JSON-serialized array describing messages to be sent, must include 2-10 items
 * @property bool $disable_notification Sends messages silently. Users will receive a notification with no sound.
 * @property bool $protect_content Protects the contents of the sent messages from forwarding and saving
 * @property int $reply_to_message_id If the messages are a reply, ID of the original message
 * @property bool $allow_sending_without_reply Pass True if the message should be sent even if the specified replied-to message is not found
 *
 *
 * @see https://api.telegram.org/bots/api#sendmediagroup
 */
class SendMediaGroup extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'Message[]';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return Message[]
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}