<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\WebhookInfo;

/**
 * @class GetWebhookInfo
 * @description Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
 *
 *
 *
 * @see https://api.telegram.org/bots/api#getwebhookinfo
 */
class GetWebhookInfo extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'WebhookInfo';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return WebhookInfo
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}