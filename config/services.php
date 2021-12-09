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

    'google' => [
        'client_id' => '838167123939-5nk7sr3naln0ooltn0t3dr6arjljoet9.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/laravel-framework/google/return',
      ], 

      'facebook' => [
        'client_id' => '454433446108628',
        'client_secret' => '6ea0c07f7de4ebc3a1c5d3033658ad24',
        'redirect' => 'http://localhost/laravel-framework/fakebook/return',
    ],
];
