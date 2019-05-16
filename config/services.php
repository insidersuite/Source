<?php
    return [
    /*
     |--------------------------------------------------------------------------
     | Third Party Services
     |--------------------------------------------------------------------------
     |
     | This file is for storing the credentials for third party services such
     | as Stripe, Mailgun, SparkPost and others. This file provides a sane
     | default location for this type of information, allowing packages
     | to have a conventional place to find your various credentials.
     |
     */
    'mailgun' => [
    'domain' => env('MAILGUN_DOMAIN'),
    'secret' => env('MAILGUN_SECRET'),
    ],
    'ses' => [
    'key' => env('SES_KEY'),
    'secret' => env('SES_SECRET'),
    'region' => 'us-east-1',
    ],
    'sparkpost' => [
    'secret' => env('SPARKPOST_SECRET'),
    ],
    'stripe' => [
    'model' => App\User::class,
    'key' => env('STRIPE_KEY', 'pk_live_w9jFXus57o0XyM73UBOQXsnA'),
    'secret' => env('STRIPE_SECRET', 'sk_live_LRNViFdylvAv3CGczs2p0xOT'),
    ],
    'facebook' => [
    'client_id' => '625441737790452',
    'client_secret' => '097a40ef5c6022fdad5d8d809b1778a7',
    'redirect' => 'https://www.insidersuite.com/facebook/callback',
    ],
    'google' => [
    'client_id' => '157886487627-edlb1tpum2gofiktbgctvrspjqtevv95.apps.googleusercontent.com',
    'client_secret' => 'z0H1O1T2fl0vbihutYKjgGc5',
    'redirect' => 'https://www.insidersuite.com/google/callback',
    ],
    ];
