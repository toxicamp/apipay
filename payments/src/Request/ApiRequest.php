<?php

namespace Payments\Request;

use Payments\Client\CurlRequestTransformer;
use Payments\Contract\EndpointInterface;
use Payments\Contract\RequestInterface;
use Payments\Contract\RequestTransformerInterface;
use Payments\Contract\ResponseInterface;
use Payments\Credential\AccountSecretCredential;
use Payments\Domain\Reason;
use Payments\Endpoint\{ApiEasypayEndpoint, ApiSettlepayEndpoint};
use Payments\Exception\ApiException;
use Payments\Exception\SignatureException;
use Payments\Helper\SignatureHelper;

abstract class ApiRequest implements RequestInterface
{
    const API_VERSION = 1;

    /**
     * @var RequestTransformerInterface
     */
    private $transformer;

    /**
     * @var EndpointInterface
     */
    private $endpoint;

    /**
     * @var AccountSecretCredential
     */
    private $credential;

    public function __construct(AccountSecretCredential $credential)
    {
        $this->credential = $credential;
    }

    public function getTransactionData()
    {
        $auth = SignatureHelper::calculateSignature(
            $this->credential
        );

        return array(
            'auth' => $auth,
//            'point' =>$this->credential->getAccount(),
//            'key' =>$auth['key'],
//            'hash' =>$auth['hash']
        );
    }

    public function getRequestSignatureFieldsValues()
    {
        return array(
            'merchantAccount' => $this->credential->getAccount(),
        );
    }

    public function getResponseSignatureFieldsRequired()
    {
        return array();
    }

    /**
     * @return EndpointInterface|ApiEndpoint
     */
    public function getEndpoint()
    {

        $paymentSlug = request()->get('payment');
        if (!$this->endpoint) {
            $className = '\Payments\Endpoint\Api'.ucfirst($paymentSlug).'Endpoint';
            $this->endpoint = new $className();
        }

        return $this->endpoint;
    }

    /**
     * @param EndpointInterface $endpoint
     * @return ApiRequest
     */
    public function setEndpoint(EndpointInterface $endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return RequestTransformerInterface|CurlRequestTransformer
     */
    public function getTransformer()
    {
        if (!$this->transformer) {
            $this->transformer = new CurlRequestTransformer();
        }

        return $this->transformer;
    }

    /**
     * @param RequestTransformerInterface $transformer
     * @return ApiRequest
     */
    public function setTransformer($transformer)
    {
        $this->transformer = $transformer;

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function send()
    {
        try {
            return $this->getTransformer()->transform($this);
        } catch (\Exception $e) {
            dd($e->getTrace());
            throw new ApiException(new Reason(-1, $e->getMessage()));
        }
    }

    abstract public function getResponseClass();

    /**
     * @param array $data
     * @return ResponseInterface
     * @throws \Exception
     */
    public function getResponse(array $data)
    {
        $class = $this->getResponseClass();
        $response = new $class($data);


        return $response;
    }

 abstract public function getSlug();
}
