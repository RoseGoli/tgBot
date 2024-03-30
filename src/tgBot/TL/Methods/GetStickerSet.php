<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\StickerSet;

/**
 * @class GetStickerSet
 * @description Use this method to get a sticker set. On success, a StickerSet object is returned.
 *
 * @property string $name Name of the sticker set
 *
 *
 * @see https://api.telegram.org/bots/api#getstickerset
 */
class GetStickerSet extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'StickerSet';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return StickerSet
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}