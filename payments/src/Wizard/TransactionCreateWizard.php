<?php

namespace Payments\Wizard;

use Payments\Collection\Dto;
use Payments\Credential\AccountSecretCredential;
use Payments\Request\TransactionCreateRequest;

class TransactionCreateWizard extends RequestWizard
{
    /**
    * @var AccountSecretCredential
         */
    protected $credential;

    /**
     * @var string
     */
    protected $orderReference;

    protected $propertyRequired = array('orderReference');

    private $dto;

    /**
     * @param AccountSecretCredential $credential
     * @return TransactionCreateWizard
     */
    public static function post(AccountSecretCredential $credential)
    {
        return new self($credential);
    }

    public function __construct(AccountSecretCredential $credential)
    {
        $this->credential = $credential;
    }

    public function setDto(Dto $dto)
    {
        $this->dto = $dto;
        return $this;
    }


    /**
     * @param string $orderReference
     * @return TransactionCreateWizard
     */
    public function setOrderReference($orderReference)
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    /**
     * @return TransactionCreateRequest
     */
    public function getRequest()
    {
        $this->check();

        return new TransactionCreateRequest($this->credential, $this->dto);
    }
}
