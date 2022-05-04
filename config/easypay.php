<?php


return [
    'url_easypay' => 'https://merchantapi.easypay.ua',
    'url' => env('EASYPAY_URL', 'https://api.easypay.ua/' ), //'https://merchantapi.easypay.ua'
    'PartnerKey' => env('PARTNERKEY', 'easypay-test'),
    'ServiceKey' => env('SERVICEKEY', 'MERCHANT-TEST'),
    'SecretKey' => env('SECRETKEY', 'test'),
    'phone' => env('EASYPAY_PHONE', 'test'),
    'password' => env('EASYPAY_PASSWORD', 'test'),
    'auth_url' => env('EASYPAY_AUTH', 'test'),
];

