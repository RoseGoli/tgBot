<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class BotCommandScopeDefault
 * @description Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified for the user.
 *
 * @method string getType() Scope type, must be default
 *
 * @method bool isType()
 *
 * @method $this setType()
 *
 * @method $this unsetType()
 *
 * @property string $type Scope type, must be default
 *
 * @see https://core.telegram.org/bots/api#botcommandscopedefault
 */
class BotCommandScopeDefault extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'type' => 'string',
    ];
}