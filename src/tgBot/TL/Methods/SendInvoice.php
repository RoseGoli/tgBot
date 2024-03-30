<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\InlineKeyboardMarkup;
use tgBot\TL\Types\LabeledPrice;
use tgBot\TL\Types\Message;

/**
 * @class SendInvoice
 * @description Use this method to send invoices. On success, the sent Message is returned.
 *
 * @property int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $title Product name, 1-32 characters
 * @property string $description Product description, 1-255 characters
 * @property string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * @property string $provider_token Payment provider token, obtained via @BotFather
 * @property string $currency Three-letter ISO 4217 currency code, see more on currencies
 * @property LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * @property int $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * @property int[] $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property string $start_parameter Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
 * @property string $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * @property string $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
 * @property int $photo_size Photo size in bytes
 * @property int $photo_width Photo width
 * @property int $photo_height Photo height
 * @property bool $need_name Pass True if you require the user's full name to complete the order
 * @property bool $need_phone_number Pass True if you require the user's phone number to complete the order
 * @property bool $need_email Pass True if you require the user's email address to complete the order
 * @property bool $need_shipping_address Pass True if you require the user's shipping address to complete the order
 * @property bool $send_phone_number_to_provider Pass True if the user's phone number should be sent to provider
 * @property bool $send_email_to_provider Pass True if the user's email address should be sent to provider
 * @property bool $is_flexible Pass True if the final price depends on the shipping method
 * @property bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property int $reply_to_message_id If the message is a reply, ID of the original message
 * @property bool $allow_sending_without_reply Pass True if the message should be sent even if the specified replied-to message is not found
 * @property InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
 *
 *
 * @see https://api.telegram.org/bots/api#sendinvoice
 */
class SendInvoice extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'Message';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return Message
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}