<?php

namespace tgBot\TL\Methods;


use tgBot\Telegram;

/**
 * @class PromoteChatMember
 * @description Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 *
 * @property int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int $user_id Unique identifier of the target user
 * @property bool $is_anonymous Pass True if the administrator's presence in the chat is hidden
 * @property bool $can_manage_chat Pass True if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * @property bool $can_post_messages Pass True if the administrator can create channel posts, channels only
 * @property bool $can_edit_messages Pass True if the administrator can edit messages of other users and can pin messages, channels only
 * @property bool $can_delete_messages Pass True if the administrator can delete messages of other users
 * @property bool $can_manage_video_chats Pass True if the administrator can manage video chats
 * @property bool $can_restrict_members Pass True if the administrator can restrict, ban or unban chat members
 * @property bool $can_promote_members Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him)
 * @property bool $can_change_info Pass True if the administrator can change chat title, photo and other settings
 * @property bool $can_invite_users Pass True if the administrator can invite new users to the chat
 * @property bool $can_pin_messages Pass True if the administrator can pin messages, supergroups only
 *
 *
 * @see https://api.telegram.org/bots/api#promotechatmember
 */
class PromoteChatMember extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'bool';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return bool
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}