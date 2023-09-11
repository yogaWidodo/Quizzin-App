<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'google' => [
        'client_id' => '633338625487-dc1t8h9ac41jl60n2ostpr7ih5afgj3r.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/callback',
    ],

    // 'twitter' => [
    //     'client_id' => 'tsjj50LRAmNpcRJesIWbB1YSQ',
    //     'client_secret' => 'NjWLzuF89dnfPmvlQRZYDCHTTSp8xdghkP3ULsNnl0t1OHzKB4',
    //     'redirect' => 'http://127.0.0.1:8000/auth/callback',
    // ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
