<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Documentation Visibility
    |--------------------------------------------------------------------------
    |
    | This option controls whether the API documentation section is displayed
    | on the welcome page. Set to false to hide the API documentation.
    |
    */

    'show_api_documentation' => env('SHOW_API_DOCUMENTATION', true),

    /*
    |--------------------------------------------------------------------------
    | API Endpoint
    |--------------------------------------------------------------------------
    |
    | The API endpoint for payment processing.
    |
    */

    'api_endpoint' => env('PAYMENT_API_ENDPOINT', '/api/payment/process'),

];

