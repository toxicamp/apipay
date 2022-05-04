<?php

namespace App\Service;


use App\Service\Entity\EasypayEntity;
use Illuminate\Support\Facades\Log;
use App\Service\Contracts\PaymentInterface;

class EasypayHelper implements PaymentInterface
{


    /**
     * @var Client
     */
    private $client;

    private $phone;
    private $password;
    private $appId;
    private $pageId;
    private $requestedSessionId;
    private $token;
    private $number;
    private $balance;

    public function __construct()
    {
        $this->connect();

        $this->phone = config('easypay.phone');
        $this->password = config('easypay.password');
    }

    public function connect()
    {
        $url = config('easypay.url');
        $this->client = new Client($url);
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param mixed $appId
     */
    public function setTokens($token): void
    {
        $this->token = $token;
    }
    public function getTokens()
    {
        return $this->token;
    }

    /**
     * @param mixed $appId
     */
    public function setAppId($appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * @param mixed $pageId
     */
    public function setPageId($pageId): void
    {
        $this->pageId = $pageId;
    }

    /**
     * номер хозяйского счета
     *
     * @param $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getRequestedSessionId()
    {
        return $this->requestedSessionId;
    }

    /**
     * @param mixed $requestedSessionId
     */
    public function setRequestedSessionId($requestedSessionId): void
    {
        $this->requestedSessionId = $requestedSessionId;
    }


    public function getToken()
    {
        try {


            $preparedData = [
                "test" => '',


            ];


            $result = $this->client->doPostGuzzle(
                'api/system/createApp',
                $preparedData
            );
            if (array_key_exists('requestedSessionId', $result)) {
                $this->setRequestedSessionId($result['requestedSessionId']);
                $this->setAppId($result['appId']);
                $this->setPageId($result['pageId']);
                return $result;
            } else {
                return false;
            }


        } catch (\Exception $e) {


            Log::error($e->getMessage());
            return false;

        }

    }

    public function loginAuth()
    {
        $url = config('easypay.auth_url').'api/auth/desktop';
        $partnerKey = config('easypay.PartnerKey');
        $curl = 'curl -X POST "'.$url.'" -H "accept: */*" -H "AppId: '.$this->getAppId().'" -H "Locale: UA" -H "PartnerKey: '.$partnerKey.'" -H "Content-Type: application/json" -d "{\"phone\":\"'. $this->phone.'\",\"password\":\"'.$this->password.'\"}"'; //
        $output=null;
        $retval=null;
        exec($curl, $output, $retval);
        $data = implode('', $output);
        $result = json_decode($data, true);
        $this->setTokens($result['data']);


        return isset($result['data']) ? $result['data'] :  $result['error'];
    }

    public function createWallet($name)
    {
        $url = config('easypay.url').'api/wallets/add';
        $partnerKey = config('easypay.PartnerKey');
        $curl = 'curl -X POST "'.$url.'" -H "accept: */*" -H "AppId: '.$this->getAppId().'" -H "pageid: '.$this->getPageId().'" -H "authorization: bearer '.$this->getTokens()['access_token'].'" -H "Locale: UA" -H "PartnerKey: '.$partnerKey.'" -H "Content-Type: application/json" -d "{\"name\":\"'. $name.'\"}"'; //
        $output=null;
        $retval=null;
        exec($curl, $output, $retval);
        $data = implode('', $output);
        $result = json_decode($data, true);

        return $result;
    }

    public function getWallets()
    {
        $url = config('easypay.url').'api/wallets/get';
        $partnerKey = config('easypay.PartnerKey');
        $curl = 'curl -X GET "'.$url.'" -H "accept: */*" -H "AppId: '.$this->getAppId().'" -H "pageid: '.$this->getPageId().'" -H "authorization: bearer '.$this->getTokens()['access_token'].'" -H "Locale: UA" -H "PartnerKey: '.$partnerKey.'" -H "Content-Type: application/json" '; //
        $output=null;
        $retval=null;
        exec($curl, $output, $retval);
        $data = implode('', $output);
        $result = json_decode($data, true);

        return isset($result['wallets']) ? $result['wallets'] :  $result['error'];

    }

    private function getSession()
    {

        try {


            $preparedData = [
                "AppId" => $this->getAppId(),
                "PartnerKey" => $this->getAppId(),


            ];


            $result = $this->client->doPostGuzzle(
                'api/system/createApp',
                $preparedData
            );
            if (array_key_exists('requestedSessionId', $result)) {
                $this->setRequestedSessionId($result['requestedSessionId']);
                $this->setAppId($result['appId']);
                $this->setPageId($result['pageId']);
                return true;
            } else {
                return false;
            }


        } catch (\Exception $e) {


            Log::error($e->getMessage());
            return false;


        }


    }

    public function isTransactionSuccess()
    {
        $wallets = $this->getWallets();
        foreach($wallets as $wallet){
            if ($wallet['number'] == $this->number){
                if($this->balance < $wallet['balance']){
                    return true;
                }
            }
        }

        return false;
    }

    public function send()
    {

    }

    public function client()
    {
        return $this->client;
    }
}
