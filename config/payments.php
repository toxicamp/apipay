<?php

return [
    'easypay' => [
        'account' => '',
        'api_token' => '',
    ],

    'settlepay' => [
        'account' => 9445,
        'api_token' => 'HkW6Ixo9Tv7JA%b9nbedwCqdprG3idr%',
        'service_id' => [
            'on' => 582,
            'off'=> 581
        ],
        'acc' => 9515,
        'wallet' => 10889,
        'point' => [
            'callback_url' => env('APP_URL').'/callback/{transaction_id}',
            'success_url' => env('APP_URL').'/success/{transaction_id}',
            'fail_url' => env('APP_URL').'/fail/{transaction_id}',
        ]
    ],

];
