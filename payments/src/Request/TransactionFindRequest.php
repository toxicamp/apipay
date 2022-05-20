<?php

namespace Payments\Request;

use Payments\Credential\AccountSecretCredential;
use Payments\Response\TransactionResponse;

/**
 * Class CheckRequest
 * @package WayForPay\SDK\Request
 * @method CheckResponse send()
 */
class TransactionFindRequest extends ApiRequest
{
    /**
     * @var string
     */
    private $orderReference;

    public function __construct(AccountSecretCredential $credential, $orderReference)
    {
        parent::__construct($credential);

        $this->orderReference = $orderReference;
    }

    public function getRequestSignatureFieldsValues()
    {
        return array_merge(parent::getRequestSignatureFieldsValues(), array(
            'orderReference' => $this->orderReference,
        ));
    }

    public function getResponseSignatureFieldsRequired()
    {
        $res = $this->orderReference->getResult();


        return array(
            'id' => $res->get('id')
        );
    }

    public function getTransactionType()
    {
        return 'CHECK_STATUS';
    }

    public function getTransactionData()
    {
        return parent::getTransactionData();

    }

    public function getResponseClass()
    {
        return TransactionResponse::getClass();
    }
    public function getSlug()
    {
        return '/transaction/find';
    }
}
