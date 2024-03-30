<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class VideoChatEnded
 * @description This object represents a service message about a video chat ended in the chat.
 *
 * @method int getDuration() Video chat duration in seconds
 *
 * @method bool isDuration()
 *
 * @method $this setDuration()
 *
 * @method $this unsetDuration()
 *
 * @property int $duration Video chat duration in seconds
 *
 * @see https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'duration' => 'int',
    ];
}