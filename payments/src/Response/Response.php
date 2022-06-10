<?php

namespace Payments\Response;

use Payments\Contract\ResponseInterface;
use Payments\Domain\Reason;
use Payments\Exception\ApiException;
use Payments\Exception\InvalidFieldException;

class Response implements ResponseInterface
{
    /**
     * @var Reason
     */
    private $reason;

    /**
     * Response constructor.
     * @param array $data
     * @throws InvalidFieldException
     * @throws ApiException
     */
    public function __construct(array $data)
    {
        if (!isset($data['reason'])) {
            throw new InvalidFieldException('Field `reason` required');
        }

        if (!isset($data['reasonCode'])) {
            throw new InvalidFieldException('Field `reason` required');
        }

        $this->reason = new Reason($data['reasonCode'], $data['reason']);

        if (!$this->reason->isOK()) {
//            throw new ApiException($this->reason);
        }
    }

    /**
     * @return Reason
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }
}
