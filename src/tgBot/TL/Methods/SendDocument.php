<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\ForceReply;
use tgBot\TL\Types\InlineKeyboardMarkup;
use tgBot\TL\Types\InputFile;
use tgBot\TL\Types\Message;
use tgBot\TL\Types\MessageEntity;
use tgBot\TL\Types\ReplyKeyboardMarkup;
use tgBot\TL\Types\ReplyKeyboardRemove;

/**
 * @class SendDocument
 * @description Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 *
 * @property int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property InputFile|string $document File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
 * @property InputFile|string $thumb Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * @property string $caption Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities parsing
 * @property string $parse_mode Mode for parsing entities in the document caption. See formatting options for more details.
 * @property MessageEntity[] $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool $disable_content_type_detection Disables automatic server-side content type detection for files uploaded using multipart/form-data
 * @property bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property int $reply_to_message_id If the message is a reply, ID of the original message
 * @property bool $allow_sending_without_reply Pass True if the message should be sent even if the specified replied-to message is not found
 * @property InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 *
 *
 * @see https://api.telegram.org/bots/api#senddocument
 */
class SendDocument extends MethodDefinition implements MethodDefinitionInterface
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
     * @return Message
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}