<?php

namespace Payments\Domain;


class Reason
{

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    public function __construct($code, $message)
    {
        $this->code = intval($code);
        $this->message = strval($message);
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function isOK()
    {
        return true;

    }
}
