<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class InlineKeyboardMarkup
 * @description This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @method InlineKeyboardButton[][] getInlineKeyboard() Array of button rows, each represented by an Array of InlineKeyboardButton objects
 *
 * @method bool isInlineKeyboard()
 *
 * @method $this setInlineKeyboard()
 *
 * @method $this unsetInlineKeyboard()
 *
 * @property InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'inline_keyboard' => 'InlineKeyboardButton[][]',
    ];
}