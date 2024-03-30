<?php

namespace tgBot\TL\Types;

use tgBot\LazyUpdates;


/**
 * @class EncryptedPassportElement
 * @description Describes documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @method string getType() Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
 * @method string getData() Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
 * @method string getPhoneNumber() Optional. User's verified phone number, available only for “phone_number” type
 * @method string getEmail() Optional. User's verified email address, available only for “email” type
 * @method PassportFile[] getFiles() Optional. Array of encrypted files with documents provided by the user, available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @method PassportFile getFrontSide() Optional. Encrypted file with the front side of the document, provided by the user. Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @method PassportFile getReverseSide() Optional. Encrypted file with the reverse side of the document, provided by the user. Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @method PassportFile getSelfie() Optional. Encrypted file with the selfie of the user holding a document, provided by the user;
 * available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @method PassportFile[] getTranslation() Optional. Array of encrypted files with translated versions of documents provided by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @method string getHash() Base64-encoded element hash for using in PassportElementErrorUnspecified
 *
 * @method bool isType()
 * @method bool isData()
 * @method bool isPhoneNumber()
 * @method bool isEmail()
 * @method bool isFiles()
 * @method bool isFrontSide()
 * @method bool isReverseSide()
 * @method bool isSelfie()
 * @method bool isTranslation()
 * @method bool isHash()
 *
 * @method $this setType()
 * @method $this setData()
 * @method $this setPhoneNumber()
 * @method $this setEmail()
 * @method $this setFiles()
 * @method $this setFrontSide()
 * @method $this setReverseSide()
 * @method $this setSelfie()
 * @method $this setTranslation()
 * @method $this setHash()
 *
 * @method $this unsetType()
 * @method $this unsetData()
 * @method $this unsetPhoneNumber()
 * @method $this unsetEmail()
 * @method $this unsetFiles()
 * @method $this unsetFrontSide()
 * @method $this unsetReverseSide()
 * @method $this unsetSelfie()
 * @method $this unsetTranslation()
 * @method $this unsetHash()
 *
 * @property string $type Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
 * @property string $data Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property string $phone_number Optional. User's verified phone number, available only for “phone_number” type
 * @property string $email Optional. User's verified email address, available only for “email” type
 * @property PassportFile[] $files Optional. Array of encrypted files with documents provided by the user, available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile $front_side Optional. Encrypted file with the front side of the document, provided by the user. Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user. Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile $selfie Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property PassportFile[] $translation Optional. Array of encrypted files with translated versions of documents provided by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property string $hash Base64-encoded element hash for using in PassportElementErrorUnspecified
 *
 * @see https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends LazyUpdates
{
    const JSON_PROPERTY_MAP = [
        'type' => 'string',
        'data' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'files' => 'PassportFile[]',
        'front_side' => 'PassportFile',
        'reverse_side' => 'PassportFile',
        'selfie' => 'PassportFile',
        'translation' => 'PassportFile[]',
        'hash' => 'string',
    ];
}