<?php

namespace Payments\Helper;

use Payments\Contract\SignatureAbleInterface;
use Payments\Credential\AccountSecretCredential;

class SignatureHelper
{
    const FIELDS_DELIMITER  = ';';
    const DEFAULT_CHARSET   = 'utf8';



    /**
     * @param array $fieldsValues
     * @param string $secret
     * @return string
     */
    public static function calculateSignature(AccountSecretCredential $credential)
    {

        $key = self::generalKey();
        $hash = self::generalHash($credential, $key);

        return [
            'point' => (int)$credential->getAccount(),
            'key' => $key,
            'hash' => $hash
        ];
    }

    private static function generalKey()
    {

      return time();

    }

    private static function generalHash($credential, $key)
    {
        return md5($credential->getAccount() . $credential->getSecret() . $key);
    }
}
