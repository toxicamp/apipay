<?php

namespace Payments\Response;

use Payments\Domain\Transaction;

class TransactionResponse extends Response
{
    /**
     * @var Transaction
     */
    private $dataInfo;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->dataInfo = Transaction::fromArray($data);
    }

    /**
     * @return Transaction
     */
    public function getResult()
    {
        return $this->dataInfo;
    }

}
