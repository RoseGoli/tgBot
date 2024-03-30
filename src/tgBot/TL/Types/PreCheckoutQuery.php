<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class PreCheckoutQuery
 * @description This object contains information about an incoming pre-checkout query.
 *
 * @method string getId() Unique query identifier
 * @method User getFrom() User who sent the query
 * @method string getCurrency() Three-letter ISO 4217 currency code
 * @method int getTotalAmount() Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @method string getInvoicePayload() Bot specified invoice payload
 * @method string getShippingOptionId() Optional. Identifier of the shipping option chosen by the user
 * @method OrderInfo getOrderInfo() Optional. Order information provided by the user
 *
 * @method bool isId()
 * @method bool isFrom()
 * @method bool isCurrency()
 * @method bool isTotalAmount()
 * @method bool isInvoicePayload()
 * @method bool isShippingOptionId()
 * @method bool isOrderInfo()
 *
 * @method $this setId()
 * @method $this setFrom()
 * @method $this setCurrency()
 * @method $this setTotalAmount()
 * @method $this setInvoicePayload()
 * @method $this setShippingOptionId()
 * @method $this setOrderInfo()
 *
 * @method $this unsetId()
 * @method $this unsetFrom()
 * @method $this unsetCurrency()
 * @method $this unsetTotalAmount()
 * @method $this unsetInvoicePayload()
 * @method $this unsetShippingOptionId()
 * @method $this unsetOrderInfo()
 *
 * @property string $id Unique query identifier
 * @property User $from User who sent the query
 * @property string $currency Three-letter ISO 4217 currency code
 * @property int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string $invoice_payload Bot specified invoice payload
 * @property string $shipping_option_id Optional. Identifier of the shipping option chosen by the user
 * @property OrderInfo $order_info Optional. Order information provided by the user
 *
 * @see https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'id' => 'string',
        'from' => 'User',
        'currency' => 'string',
        'total_amount' => 'int',
        'invoice_payload' => 'string',
        'shipping_option_id' => 'string',
        'order_info' => 'OrderInfo',
    ];
}