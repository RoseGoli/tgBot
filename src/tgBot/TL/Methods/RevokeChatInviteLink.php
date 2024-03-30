<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\ChatInviteLink;

/**
 * @class RevokeChatInviteLink
 * @description Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
 *
 * @property int|string $chat_id Unique identifier of the target chat or username of the target channel (in the format @channelusername)
 * @property string $invite_link The invite link to revoke
 *
 *
 * @see https://api.telegram.org/bots/api#revokechatinvitelink
 */
class RevokeChatInviteLink extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'ChatInviteLink';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return ChatInviteLink
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}