<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class PassportData
 * @description Describes Telegram Passport data shared with the bot by the user.
 *
 * @method EncryptedPassportElement[] getData() Array with information about documents and other Telegram Passport elements that was shared with the bot
 * @method EncryptedCredentials getCredentials() Encrypted credentials required to decrypt the data
 *
 * @method bool isData()
 * @method bool isCredentials()
 *
 * @method $this setData()
 * @method $this setCredentials()
 *
 * @method $this unsetData()
 * @method $this unsetCredentials()
 *
 * @property EncryptedPassportElement[] $data Array with information about documents and other Telegram Passport elements that was shared with the bot
 * @property EncryptedCredentials $credentials Encrypted credentials required to decrypt the data
 *
 * @see https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'data' => 'EncryptedPassportElement[]',
        'credentials' => 'EncryptedCredentials',
    ];
}