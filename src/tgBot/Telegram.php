<?php

namespace tgBot;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Utils;
use tgBot\TL\Methods\MethodDefinitionInterface;
use tgBot\TL\Types\BotCommand;
use tgBot\TL\Types\Chat;
use tgBot\TL\Types\ChatAdministratorRights;
use tgBot\TL\Types\ChatInviteLink;
use tgBot\TL\Types\ChatMember;
use tgBot\TL\Types\Error;
use tgBot\TL\Types\File;
use tgBot\TL\Types\GameHighScore;
use tgBot\TL\Types\InlineKeyboardButton;
use tgBot\TL\Types\KeyboardButtonInterface;
use tgBot\TL\Types\MenuButton;
use tgBot\TL\Types\Message;
use tgBot\TL\Types\MessageId;
use tgBot\TL\Types\Poll;
use tgBot\TL\Types\SentWebAppMessage;
use tgBot\TL\Types\Sticker;
use tgBot\TL\Types\StickerSet;
use tgBot\TL\Types\User;
use tgBot\TL\Types\UserProfilePhotos;
use tgBot\TL\Types\WebhookInfo;
use tgBot\TL\Update;
use tgBot\Tools\Constant;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @class Telegram
 *
 * @method Update[] getUpdates(...$params) Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
 * @method bool setWebhook(...$params) Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success. If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
 * @method bool deleteWebhook(...$params) Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
 * @method WebhookInfo getWebhookInfo(...$params) Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
 * @method User getMe(...$params) A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method bool logOut(...$params) Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
 * @method bool close(...$params) Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
 * @method Message sendMessage(...$params) Use this method to send text messages. On success, the sent Message is returned.
 * @method Message forwardMessage(...$params) Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent Message is returned.
 * @method MessageId copyMessage(...$params) Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
 * @method Message sendPhoto(...$params) Use this method to send photos. On success, the sent Message is returned.
 * @method Message sendAudio(...$params) Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
 * For sending voice messages, use the sendVoice method instead.
 * @method Message sendDocument(...$params) Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 * @method Message sendVideo(...$params) Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 * @method Message sendAnimation(...$params) Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
 * @method Message sendVoice(...$params) Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 * @method Message sendVideoNote(...$params) As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
 * @method Message[] sendMediaGroup(...$params) Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Messages that were sent is returned.
 * @method Message sendLocation(...$params) Use this method to send point on the map. On success, the sent Message is returned.
 * @method Message|bool editMessageLiveLocation(...$params) Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 * @method Message|bool stopMessageLiveLocation(...$params) Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
 * @method Message sendVenue(...$params) Use this method to send information about a venue. On success, the sent Message is returned.
 * @method Message sendContact(...$params) Use this method to send phone contacts. On success, the sent Message is returned.
 * @method Message sendPoll(...$params) Use this method to send a native poll. On success, the sent Message is returned.
 * @method Message sendDice(...$params) Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
 * @method bool sendChatAction(...$params) Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
 * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
 * @method UserProfilePhotos getUserProfilePhotos(...$params) Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
 * @method File getFile(...$params) Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
 * @method bool banChatMember(...$params) Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool unbanChatMember(...$params) Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
 * @method bool restrictChatMember(...$params) Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 * @method bool promoteChatMember(...$params) Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 * @method bool setChatAdministratorCustomTitle(...$params) Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 * @method bool banChatSenderChat(...$params) Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool unbanChatSenderChat(...$params) Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool setChatPermissions(...$params) Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
 * @method string exportChatInviteLink(...$params) Use this method to generate a new primary invite link for a chat;
 * any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
 * @method ChatInviteLink createChatInviteLink(...$params) Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
 * @method ChatInviteLink editChatInviteLink(...$params) Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
 * @method ChatInviteLink revokeChatInviteLink(...$params) Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
 * @method bool approveChatJoinRequest(...$params) Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 * @method bool declineChatJoinRequest(...$params) Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 * @method bool setChatPhoto(...$params) Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool deleteChatPhoto(...$params) Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool setChatTitle(...$params) Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool setChatDescription(...$params) Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 * @method bool pinChatMessage(...$params) Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 * @method bool unpinChatMessage(...$params) Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 * @method bool unpinAllChatMessages(...$params) Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 * @method bool leaveChat(...$params) Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 * @method Chat getChat(...$params) Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a Chat object on success.
 * @method ChatMember[] getChatAdministrators(...$params) Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
 * @method int getChatMemberCount(...$params) Use this method to get the number of members in a chat. Returns Int on success.
 * @method ChatMember getChatMember(...$params) Use this method to get information about a member of a chat. Returns a ChatMember object on success.
 * @method bool setChatStickerSet(...$params) Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 * @method bool deleteChatStickerSet(...$params) Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 * @method bool answerCallbackQuery(...$params) Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
 * @method bool setMyCommands(...$params) Use this method to change the list of the bot's commands. See https://core.telegram.org/bots#commands for more details about bot commands. Returns True on success.
 * @method bool deleteMyCommands(...$params) Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
 * @method BotCommand[] getMyCommands(...$params) Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
 * @method bool setChatMenuButton(...$params) Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
 * @method MenuButton getChatMenuButton(...$params) Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
 * @method bool setMyDefaultAdministratorRights(...$params) Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are are free to modify the list before adding the bot. Returns True on success.
 * @method ChatAdministratorRights getMyDefaultAdministratorRights(...$params) Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
 * @method Message|bool editMessageText(...$params) Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 * @method Message|bool editMessageCaption(...$params) Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 * @method Message|bool editMessageMedia(...$params) Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 * @method Message|bool editMessageReplyMarkup(...$params) Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 * @method Poll stopPoll(...$params) Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
 * @method bool deleteMessage(...$params) Use this method to delete a message, including service messages, with the following limitations:- A message can only be deleted if it was sent less than 48 hours ago.- A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted can_post_messages permissions can delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message there.- If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.Returns True on success.
 * @method Message sendSticker(...$params) Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
 * @method StickerSet getStickerSet(...$params) Use this method to get a sticker set. On success, a StickerSet object is returned.
 * @method Sticker[] getCustomEmojiStickers(...$params) Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
 * @method File uploadStickerFile(...$params) Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times). Returns the uploaded File on success.
 * @method bool createNewStickerSet(...$params) Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker. Returns True on success.
 * @method bool addStickerToSet(...$params) Use this method to add a new sticker to a set created by the bot. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker. Animated stickers can be added to animated sticker sets and only to them. Animated sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns True on success.
 * @method bool setStickerPositionInSet(...$params) Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
 * @method bool deleteStickerFromSet(...$params) Use this method to delete a sticker from a set created by the bot. Returns True on success.
 * @method bool setStickerSetThumb(...$params) Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. Video thumbnails can be set only for video sticker sets only. Returns True on success.
 * @method bool answerInlineQuery(...$params) Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
 * @method SentWebAppMessage answerWebAppQuery(...$params) Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
 * @method Message sendInvoice(...$params) Use this method to send invoices. On success, the sent Message is returned.
 * @method string createInvoiceLink(...$params) Use this method to create a link for an invoice. Returns the created invoice link as String on success.
 * @method bool answerShippingQuery(...$params) If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
 * @method bool answerPreCheckoutQuery(...$params) Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
 * @method bool setPassportDataErrors(...$params) Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
 * @method Message sendGame(...$params) Use this method to send a game. On success, the sent Message is returned.
 * @method Message|bool setGameScore(...$params) $data = []) Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
 * @method GameHighScore[] getGameHighScores(...$params) Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
 */
class Telegram
{
    private Browser $browser;

    private string $baseUri = 'https://api.telegram.org/';

    protected ?string $parseMode = null;

    protected ?string $signature = null;

    private array $couldBeUpload = Constant::MEDIA_TYPES;

    public function __construct(protected string $token, array $browserConfig = [])
    {
        $this->browser = Browser::factory([
            'base_uri' => $this->baseUri,
        ])->withConfig($browserConfig);
    }

    public static function factory(string $token, array $browserConfig = []): Telegram
    {
        return new self($token, $browserConfig);
    }

    public function setParseMode($parseMode): Telegram
    {
        $this->parseMode = $parseMode;

        return $this;
    }

    public function setSignature($signature): Telegram
    {
        $this->signature = $signature;

        return $this;
    }

    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;

        $this->browser = $this->browser->withConfig([
            'base_uri' => $baseUri,
        ]);
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function getBrowser(): Browser
    {
        return $this->browser;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    private function parseLogicContents(mixed $contents)
    {
        if (is_array($contents)) {
            array_walk_recursive($contents, function (&$value) {
                $value = Tools\Utils::isStringable($value) ? (
                    Tools\Utils::isJson((string) $value) ? json_decode((string) $value) : $value
                ) : $value;
            });

            return json_encode($contents);
        } elseif (Tools\Utils::isStringable($contents)) {
            return (string) $contents;
        }

        return $contents;
    }

    public function fetchAsync($uri, array $fields = []): PromiseInterface
    {
        // Make sure the multipart form data is not empty
//        $fields['timestamp'] = time();
        $files = [];
        $multipart = [];
        $isInlineKeyboard = null;
        $isResizedKeyboard = false;
        $isOnetimeKeyboard = false;
        $isSelective = false;

        if (! isset($fields['parse_mode'])) {
            $fields['parse_mode'] = $this->parseMode;
        }

        array_walk_recursive($fields, function (&$value, $attribute) use ($fields, &$files, &$isInlineKeyboard, &$isResizedKeyboard, &$isOnetimeKeyboard, &$isSelective) {
            if ($value instanceof KeyboardButtonInterface) {
                if (is_null($isInlineKeyboard)) {
                    if ($value instanceof InlineKeyboardButton) {
                        $isInlineKeyboard = true;
                    } else {
                        $isInlineKeyboard = false;
                    }
                } if (! empty($value['resize'])) {
                    $isResizedKeyboard = true;
                } if (! empty($value['one_time'])) {
                    $isOnetimeKeyboard = true;
                } if (! empty($value['selective'])) {
                    $isSelective = true;
                }
            }
            if ($value instanceof LazyUpdates) {
                $value->setTelegramRecursive($this);
            }
            if (
                is_string($value) && is_file($value) &&
                filesize($value) > 0 && in_array(strtolower($attribute), $this->couldBeUpload)
            ) {
                $name = basename($value);
                $files[$name] = $value;
                $value = 'attach://' . $name;
            }

            if (! empty($this->signature) && ! isset($fields['sign'])) {
                if (in_array($attribute, ['text', 'caption', 'message_text'])) {
                    $signature = match ($fields['parse_mode'] ?? '') {
                        'markdown' => \escape_markdown($this->signature),
                        'html' => \htmlspecialchars($this->signature),
                        default => $this->signature,
                    };

                    $value .= "\n{$signature}";
                }
            }
        });

        foreach (['chat_id', 'user_id'] as $receptable) {
            if (isset($fields[$receptable]) && strtolower($fields[$receptable]) === 'me') {
                $fields[$receptable] = $this->getId();
            }
        }

        // A shortcut for reply_markup
        if (isset($fields['buttons'])) {
            $fields['reply_markup'] = $fields['buttons'];

            unset($fields['buttons']);
        } if (isset($fields['reply_markup'])) {
            if (! is_null($isInlineKeyboard)) {
                $replyMarkup = $fields['reply_markup'];
                $type = $isInlineKeyboard ? 'inline_keyboard' : 'keyboard';

                if (isset($replyMarkup[$type])) {
                    $replyMarkup = $replyMarkup[$type];
                }

                if ($replyMarkup instanceof KeyboardButtonInterface) {
                    $fields['reply_markup'] = [
                        $type => [
                            [$replyMarkup]
                        ]
                    ];
                } elseif (
                    isset($replyMarkup[0]) &&
                    $replyMarkup[0] instanceof KeyboardButtonInterface
                ) {
                    $fields['reply_markup'][$type] = [
                        $replyMarkup
                    ];
                } elseif (is_array($replyMarkup) && (
                        ! isset($replyMarkup['keyboard']) || ! isset($replyMarkup['inline_keyboard'])
                    )) {
                    $fields['reply_markup'][$type] = $replyMarkup;
                }

                $fields['reply_markup']['resize_keyboard'] = $isResizedKeyboard;
                $fields['reply_markup']['one_time_keyboard'] = $isOnetimeKeyboard;
                $fields['reply_markup']['is_selective'] = $isSelective;
            }
        }

        foreach ($files as $fileName => $path) {
            $multipart[] = [
                'name' => $fileName,
                'contents' => Utils::tryFopen($path, 'r'),
                'filename' => $fileName,
            ];
        }

        foreach ($fields as $fieldName => $content) {
            $multipart[] = [
                'name' => $fieldName,
                'contents' => $this->parseLogicContents($content),
            ];
        }

        return $this->browser->requestAsync('POST', vsprintf('/bot%s/%s', [
            $this->getToken(), trim($uri, '/')
        ]), [
            'multipart' => $multipart,
        ])->then(
            function (ResponseInterface $response) {
                $response = json_decode($response->getBody()->getContents(), true);

                if ($response['ok']) {
                    return $response['result'];
                }

                return new Error($response);
            },
            function (Throwable $exception) {
                return new Error([
                    'ok' => false,
                    'error_code' => $exception->getCode(),
                    'description' => $exception->getMessage(),
                ]);
            }
        );
    }

    private function getId(): int
    {
        return (int) explode(':', $this->token, 2)[0];
    }

    public function __call($name, array $arguments = [])
    {
        $name = str_replace('_', '', ucwords($name, '_'));
        $name = '\\tgBot\\TL\Methods\\' . $name;

        if (class_exists($name)) {
            if (isset($arguments[0])) {
                $arguments = array_merge(array_shift($arguments), $arguments);
            }

            return $this(new $name($arguments));
        }
    }

    public function __invoke(MethodDefinitionInterface $method)
    {
        return $method($this);
    }
}
