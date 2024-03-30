<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class WebAppInfo
 * @description Describes a Web App.
 *
 * @method string getUrl() An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 *
 * @method bool isUrl()
 *
 * @method $this setUrl()
 *
 * @method $this unsetUrl()
 *
 * @property string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfo extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'url' => 'string',
    ];
}