<?php

return [
    'enable' => env('PROXY_ENABLE', false),
    'items' => [
        'HTTP_PROXY=http://127.0.0.1:7777',
        'HTTPS_PROXY=http://127.0.0.1:7777',
    ],
];
