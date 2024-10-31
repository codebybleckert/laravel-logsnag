<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'url' => env('LOGSNAG_URL', 'https://api.logsnag.com/v1'),
    'api_key' => env('LOGSNAG_API_KEY'),
    'project' => env('LOGSNAG_PROJECT'),
    'queue' => env('LOGSNAG_QUEUE', 'default'),
    'user_id_field' => 'id',
];
