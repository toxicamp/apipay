<?php

namespace Payments\Credential;

class AccountSecretCredential
{
    private $account;

    private $secret;

    private $acc;

    public function __construct($account = null, $secret = null,$acc=null)
    {
        $this->account = strval($account);
        $this->secret = strval($secret);
        $this->acc = strval($acc);
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    public function getAcc()
    {
        return $this->acc;
    }
}
