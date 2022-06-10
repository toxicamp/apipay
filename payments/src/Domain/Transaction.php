<?php

namespace Payments\Domain;

class Transaction extends TransactionBase
{
    private $external_order_id = null;
    private $external_customer_id = null;
    private $customer_ip_address;
    private $amount;
    private $amount_currency;
    private $service_id;
    private $account_id;
    private $wallet_id;
    private $description = null;
    private $fields = null;
    private $point = null;
    private $callback_url	= null;
    private $success_url	= null;
    private $fail_url	= null;
    private $cancel_url	= null;
    private $return_url	= null;
    private $extra	= null;



    public function __construct(
        $auth,
        $locale,
        $external_transaction_id,
        $customer_ip_address,
        $amount,
        $amount_currency,
        $service_id,
        $account_id,
        $wallet_id,
        $external_order_id =null,
        $external_customer_id = null,
        $description = null,
        $fields = null,
        $point = null,
        $callback_url	= null,
        $success_url	= null,
        $fail_url	= null,
        $cancel_url	= null,
        $return_url	= null,
        $extra	= null
    )
    {
       parent::__construct($auth, $locale, $external_transaction_id);
        $this->customer_ip_address = $customer_ip_address;
        $this->amount = $amount;
        $this->amount_currency = $amount_currency;
        $this->service_id = $service_id;
        $this->account_id = $account_id;
        $this->wallet_id = $wallet_id;
        $this->external_order_id = $external_order_id;
        $this->description = $description;
        $this->external_customer_id = $external_customer_id;
        $this->fields = $fields;
        $this->point = $point;
        $this->callback_url = $callback_url;
        $this->success_url = $success_url;
        $this->fail_url = $fail_url;
        $this->cancel_url = $cancel_url;
        $this->return_url = $return_url;
        $this->extra = $extra;

    }
    public function getCustomerIpAddress()
    {
        return $this->customer_ip_address;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getAmountCurrency()
    {
        return $this->amount_currency;
    }

    public function getServiceId()
    {
        return $this->service_id;
    }

    public function getAccountId()
    {
        return $this->account_id;
    }
    public function getWalletId()
    {
        return $this->wallet_id;
    }
    public function getExternalOrderId()
    {
        return $this->external_order_id;
    }
    public function getExternalCustomerId()
    {
        return $this->external_customer_id;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getFields()
    {
        return $this->fields;
    }
    public function getPoint()
    {
        return $this->point;
    }
    public function getCallbackUrl()
    {
        return $this->callback_url;
    }
    public function getSuccessUrl()
    {
        return $this->success_url;
    }
    public function getFailUrl()
    {
        return $this->fail_url;
    }
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }
    public function getReturnUrl()
    {
        return $this->return_url;
    }
    public function getExtra()
    {
        return $this->extra;
    }

    public function fromArray($data)
    {
        return new self(...$data);
        dd(__METHOD__,$data);
    }


}

