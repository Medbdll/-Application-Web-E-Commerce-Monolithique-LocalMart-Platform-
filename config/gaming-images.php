<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Gaming Image Services Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration for gaming image APIs used to fetch
    | relevant images for products and categories in the gaming e-commerce
    | platform.
    |
    */

    'unsplash' => [
        'access_key' => env('UNSPLASH_ACCESS_KEY'),
        'base_url' => 'https://api.unsplash.com',
        'cache_duration' => 86400, // 24 hours
    ],

    'pixabay' => [
        'api_key' => env('PIXABAY_API_KEY'),
        'base_url' => 'https://pixabay.com/api',
        'cache_duration' => 86400, // 24 hours
    ],

    'fallback' => [
        'base_url' => 'https://picsum.photos',
        'default_width' => 800,
        'default_height' => 600,
    ],

    'cache' => [
        'duration' => 86400, // 24 hours
        'prefix' => 'gaming_images_',
    ],
];
