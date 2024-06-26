<?php

namespace tgBot\TL\Methods;


use tgBot\Telegram;
use tgBot\TL\Types\LabeledPrice;

/**
 * @class CreateInvoiceLink
 * @description Use this method to create a link for an invoice. Returns the created invoice link as String on success.
 *
 * @property string $title Product name, 1-32 characters
 * @property string $description Product description, 1-255 characters
 * @property string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * @property string $provider_token Payment provider token, obtained via BotFather
 * @property string $currency Three-letter ISO 4217 currency code, see more on currencies
 * @property LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * @property int $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * @property int[] $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property string $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * @property string $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * @property int $photo_size Photo size in bytes
 * @property int $photo_width Photo width
 * @property int $photo_height Photo height
 * @property bool $need_name Pass True if you require the user's full name to complete the order
 * @property bool $need_phone_number Pass True if you require the user's phone number to complete the order
 * @property bool $need_email Pass True if you require the user's email address to complete the order
 * @property bool $need_shipping_address Pass True if you require the user's shipping address to complete the order
 * @property bool $send_phone_number_to_provider Pass True if the user's phone number should be sent to the provider
 * @property bool $send_email_to_provider Pass True if the user's email address should be sent to the provider
 * @property bool $is_flexible Pass True if the final price depends on the shipping method
 *
 *
 * @see https://api.telegram.org/bots/api#createinvoicelink
 */
class CreateInvoiceLink extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'string';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}