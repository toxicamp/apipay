<?php

namespace Payments\Request;

use Payments\Credential\AccountSecretCredential;
use Payments\Response\TransactionResponse;

/**
 * Class CheckRequest
 * @package WayForPay\SDK\Request
 * @method CheckResponse send()
 */
class TransactionCreateRequest extends ApiRequest
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
        $paymentSlug = $res->get('payment');

        $point = config('payments.'.$paymentSlug.'.point');
        $point ['callback_url'] = str_replace('{transaction_id}', $res->get('transaction_id'), $point ['callback_url']);
        $point ['success_url'] = str_replace('{transaction_id}', $res->get('transaction_id'), $point ['success_url']);
        $point ['fail_url'] = str_replace('{transaction_id}', $res->get('transaction_id'), $point ['fail_url']);

        return array(
            'locale' => 'ru',
            'external_transaction_id' => $res->get('transaction_id'),
            'customer_ip_address' => request()->getClientIp(),
            'amount' => (int)$res->get('price'),
            'amount_currency' => $res->get('currency'),
            'service_id' => config('payments.'.$paymentSlug.'.service_id.on'),
            'account_id' => config('payments.'.$paymentSlug.'.acc'),
            'wallet_id' => config('payments.'.$paymentSlug.'.wallet'),
            'point' => $point,
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
        return '/transaction/create';
    }
}
