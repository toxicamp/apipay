<?php

namespace Payments\Client;

use anlutro\cURL\cURL;
use anlutro\cURL\Request;
use App\Models\Transactions;
use http\Env\Response;
use Payments\Contract\RequestInterface;
use Payments\Contract\RequestTransformerInterface;
use Payments\Contract\ResponseInterface;

class CurlRequestTransformer implements RequestTransformerInterface
{
    /**
     * @param RequestInterface $transactionRequest
     * @return ResponseInterface
     */
    public function transform(RequestInterface $transactionRequest)
    {
        $endpoint = $transactionRequest->getEndpoint();
        $curl = new cURL();

        $auth = $transactionRequest->getTransactionData();
        $fields = $transactionRequest->getResponseSignatureFieldsRequired();
        if(isset($fields['external_transaction_id'])){
        $transact = Transactions::find($fields['external_transaction_id']);
        $transact->point = $auth['auth']['point'];
        $transact->key = $auth['auth']['key']
        ;
        $transact->hash = $auth['auth']['hash'];
        $transact->save();
            }
        $request = $curl->newRequest(
            $endpoint->getMethod(),
            $endpoint->getUrl() . $transactionRequest->getSlug(),
            array_merge($auth, $fields),
            Request::ENCODING_JSON
        );
//dd($request);
        $response = $curl->sendRequest($request);
//dd($response);
        return \json_decode($response->body, true);
//        $transactionRequest->getResponse(\json_decode($response->body, true) ?: array());
    }
}
