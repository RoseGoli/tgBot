<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class InlineQueryResultCachedPhoto
 * @description Represents a link to a photo stored on the Telegram servers. By default, this photo will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @method string getType() Type of the result, must be photo
 * @method string getId() Unique identifier for this result, 1-64 bytes
 * @method string getPhotoFileId() A valid file identifier of the photo
 * @method string getTitle() Optional. Title for the result
 * @method string getDescription() Optional. Short description of the result
 * @method string getCaption() Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @method string getParseMode() Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @method MessageEntity[] getCaptionEntities() Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @method InlineKeyboardMarkup getReplyMarkup() Optional. Inline keyboard attached to the message
 * @method InputMessageContent getInputMessageContent() Optional. Content of the message to be sent instead of the photo
 *
 * @method bool isType()
 * @method bool isId()
 * @method bool isPhotoFileId()
 * @method bool isTitle()
 * @method bool isDescription()
 * @method bool isCaption()
 * @method bool isParseMode()
 * @method bool isCaptionEntities()
 * @method bool isReplyMarkup()
 * @method bool isInputMessageContent()
 *
 * @method $this setType()
 * @method $this setId()
 * @method $this setPhotoFileId()
 * @method $this setTitle()
 * @method $this setDescription()
 * @method $this setCaption()
 * @method $this setParseMode()
 * @method $this setCaptionEntities()
 * @method $this setReplyMarkup()
 * @method $this setInputMessageContent()
 *
 * @method $this unsetType()
 * @method $this unsetId()
 * @method $this unsetPhotoFileId()
 * @method $this unsetTitle()
 * @method $this unsetDescription()
 * @method $this unsetCaption()
 * @method $this unsetParseMode()
 * @method $this unsetCaptionEntities()
 * @method $this unsetReplyMarkup()
 * @method $this unsetInputMessageContent()
 *
 * @property string $type Type of the result, must be photo
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $photo_file_id A valid file identifier of the photo
 * @property string $title Optional. Title for the result
 * @property string $description Optional. Short description of the result
 * @property string $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the photo
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedphoto
 */
class InlineQueryResultCachedPhoto extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'type' => 'string',
        'id' => 'string',
        'photo_file_id' => 'string',
        'title' => 'string',
        'description' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}