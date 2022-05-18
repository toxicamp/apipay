<?php

namespace Payments;

use Illuminate\Support\Facades\Request;
use Payments\Credential\AccountSecretCredential;
use Payments\Collection\Dto;
use Payments\Request\TransactionCreateRequest;
use Payments\Wizard\TransactionCreateWizard;
use Payments\Wizard\TransactionFindWizard;

class Payments
{
    /**
    * @var AccountSecretCredential
     */
    private $credentials;

    /**
     * @var string
     */
    private $merchantDomain;

    /**
    * @var string
     */
    private $merchantAccount;

    /**
     * @var string
     */
    private $merchantPassword;

    private $request;

    private $merchantAcc;

    public function __construct()
    {
        $this->request = request();
        $paymentSlug = $this->request->get('payment');
        $this->merchantAccount = config('payments.'.$paymentSlug.'.account');
        $this->merchantPassword = config('payments.'.$paymentSlug.'.api_token');
        $this->merchantAcc = config('payments.'.$paymentSlug.'.acc');
        $this->initCredentials();
    }

    /**
     * instance param
     */
    public function initCredentials()
    {
        $this->setCredentials(new AccountSecretCredential($this->merchantAccount, $this->merchantPassword, $this->merchantAcc));
    }

    /**
     * @param AccountSecretCredential $credential
     * @return $this
     */
    public function setCredentials(AccountSecretCredential $credential)
    {
        $this->credentials = $credential;
        return $this;
    }

    /**
     * @return AccountSecretCredential
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
    * @param string $domain
    * @return $this
    */
    public function setMerchantDomain($domain)
    {
        $this->merchantDomain = $domain;

        return $this;
    }

    /**
    * @return string
    */
    public function getMerchantDomain()
    {
        return $this->merchantDomain;
    }

    /**
     * @param Dto $dto
     * @return TransactionCreateRequest
     */
    public function transactionCreate(Dto $dto)
    {
        return TransactionCreateWizard::post($this->credentials)
                    ->setDto($dto)
                    ->getRequest()
                    ->send();

    }
    public function transactionFind(Dto $dto){
        return TransactionFindWizard::post($this->credentials)
            ->setDto($dto)
            ->getRequest()
            ->send();
    }
}
