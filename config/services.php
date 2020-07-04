<?php

return [

    //baseuri leri ve secret leri belirledik api requesti yapılacak
    'authors' => [
        'base_uri' => env('AUTHORS_SERVICE_BASE_URL'),
        'secret' => env('AUTHORS_SERVICE_SECRET'),
    ],
    'books' => [
        'base_uri' => env('BOOKS_SERVICE_BASE_URL'),
        'secret' => env('BOOKS_SERVICE_SECRET'),
    ]
];
