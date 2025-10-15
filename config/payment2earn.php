<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Payment-2-Earn Settings
    |--------------------------------------------------------------------------
    |
    | This file is for storing the settings for the Payment-2-Earn system.
    |
    */

    'show_api_documentation' => env('PAYMENT2EARN_SHOW_API_DOCS', false),

    'api_endpoint' => env('PAYMENT2EARN_API_ENDPOINT', '/api/payment/process'),
];

