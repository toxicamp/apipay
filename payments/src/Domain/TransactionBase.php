<?php

namespace Payments\Domain;

use DateTime;
use Payments\Exception\InvalidFieldException;

class TransactionBase
{


    private $auth;
    private $locale;
    private $external_transaction_id;



    public function __construct($auth, $locale, $external_transaction_id)
    {
        $this->auth = $auth;
        $this->locale = $locale;
        $this->external_transaction_id = $external_transaction_id;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function getExternalTransactionId()
    {
        return $this->external_transaction_id;
    }



}
