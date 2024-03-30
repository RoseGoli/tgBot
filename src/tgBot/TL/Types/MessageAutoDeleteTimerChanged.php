<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class MessageAutoDeleteTimerChanged
 * @description This object represents a service message about a change in auto-delete timer settings.
 *
 * @method int getMessageAutoDeleteTime() New auto-delete time for messages in the chat;
 * in seconds
 *
 * @method bool isMessageAutoDeleteTime()
 *
 * @method $this setMessageAutoDeleteTime()
 *
 * @method $this unsetMessageAutoDeleteTime()
 *
 * @property int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
 *
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
class MessageAutoDeleteTimerChanged extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'message_auto_delete_time' => 'int',
    ];
}