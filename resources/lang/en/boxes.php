<?php

return [
    'http_errors' => [
        '404' => [
            'title' => 'Page not found',
            'text' => 'The requested page was not found, or an error occurred'
        ],
        '429' => [
            'title' => 'Too many requests',
            'text' => 'You have submitted too many requests. Please wait a minute'
        ],
        'default' => [
            'title' => 'An error has occurred',
            'text' => 'Sorry, something went wrong'
        ],
    ]
];
