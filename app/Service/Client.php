<?php

namespace App\Service;

use App\Exceptions\CurlErrorException;
use App\Service\Entity\EasypayEntity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use anlutro\cURL\cURL;

class Client
{


    /**
     * @var string
     */
    private $apiAddress;
    private $secretKey = null;

    public function __construct($apiAddress)
    {
        $this->apiAddress = $apiAddress;
    }

    public function setApiAddress($apiAddress)
    {
        $this->apiAddress = $apiAddress;
        return $this;
    }


    /**
     * @throws CurlErrorException
     */
    public function getRequest(string $url, array $customCurlParams = []): array
    {
        $this->prepareString($url);

        $curlOpt = [
                CURLOPT_URL => $this->apiAddress . $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 300,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ] + $customCurlParams;

        $curl = curl_init();
        curl_setopt_array($curl, $curlOpt);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if ($error) {
            Log::info("getRequest ", [
                'error' => $error
            ]);
            throw (new CurlErrorException())->setError($error);
        }

        return json_decode($response, true);
    }

    /**
     * @throws CurlErrorException
     */
    public function getRequestRaw(string $url): string
    {
        $curlOpt = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $curlOpt);
        $response = curl_exec($curl);

        return $response;
    }

    /**
     * @param string $url
     * @param string $postFields
     * @param array $headers
     * @param array $customCurlParams
     * @return bool|mixed|string
     * @throws CurlErrorException
     */
    public function postRequest(string $url, $postFields = '', array $headers = [], array $customCurlParams = [])
    {
        $this->prepareString($url);
        if (is_string($postFields)) {
            $this->prepareString($postFields);
        }

        $curlOpt = [
                CURLOPT_URL => $this->apiAddress . $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $postFields,
                CURLOPT_HTTPHEADER => $headers,
            ] + $customCurlParams;

        $curl = curl_init();
        curl_setopt_array($curl, $curlOpt);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            throw (new CurlErrorException())->setError($error);
        }

        return (json_decode($response, true)) ?? $response;
    }

    /**
     * @param $url
     * @param array $postFields
     * @param array $headers
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function doPostGuzzle($url, $postFields = [], $headers = [])
    {
        /**
         * Делаем попытку подставить
         */
        if (isset($postFields['key'])) {
            $postFields['key'] = $this->secretKey;
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $this->apiAddress . $url, [
            'form_params' => $postFields
        ]);
        return (json_decode((string)$response->getBody(), true)) ?? $response;
    }

    private function prepareString(string &$string)
    {
        $data = [
            '{secretKey}' => $this->secretKey,
        ];

        $string = str_ireplace(array_keys($data), array_values($data), $string);
    }

    public function sendEasyPay(EasypayEntity $entity)
    {
        $headers = [
                'Content-Type' => 'application/json',
                'locale' => 'ua',
            ] + $entity->getHeaders();

        $curlOpt = [
                CURLOPT_URL => $entity->getUrl(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $entity->getMethod(),
                CURLOPT_POSTFIELDS => $entity->getFields(),
                CURLOPT_HTTPHEADER => $headers,
            ] + $entity->getParams();

        $curl = curl_init();
        curl_setopt_array($curl, $curlOpt);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            Log::info("getRequest ", [
                'error' => $error
            ]);
            throw (new CurlErrorException())->setError($error);
        }

        return $response;

    }

}
