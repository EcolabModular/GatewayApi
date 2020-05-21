<?php

return [
    'dictionaries' => [
        'base_uri' => env('DICTIONARIES_SERVICE_BASE_URL'),
        'secret' => env('DICTIONARIES_SERVICE_SECRET'),
    ],

    'files' => [
        'base_uri' => env('FILES_SERVICE_BASE_URL'),
        'secret' => env('FILES_SERVICE_SECRET'),
    ],

    'institutions' => [
        'base_uri' => env('INSTITUTIONS_SERVICE_BASE_URL'),
        'secret' => env('INSTITUTIONS_SERVICE_SECRET'),
    ],

    'items' => [
        'base_uri' => env('ITEMS_SERVICE_BASE_URL'),
        'secret' => env('ITEMS_SERVICE_SECRET'),
    ],

    'laboratories' => [
        'base_uri' => env('LABORATORIES_SERVICE_BASE_URL'),
        'secret' => env('LABORATORIES_SERVICE_SECRET'),
    ],

    'notes' => [
        'base_uri' => env('NOTES_SERVICE_BASE_URL'),
        'secret' => env('NOTES_SERVICE_SECRET'),
    ],

    'reports' => [
        'base_uri' => env('REPORTS_SERVICE_BASE_URL'),
        'secret' => env('REPORTS_SERVICE_SECRET'),
    ],

    'reportfields' => [
        'base_uri' => env('REPORTFIELDS_SERVICE_BASE_URL'),
        'secret' => env('REPORTFIELDS_SERVICE_SECRET'),
    ],

    'schedularies' => [
        'base_uri' => env('SCHEDULARIES_SERVICE_BASE_URL'),
        'secret' => env('SCHEDULARIES_SERVICE_SECRET'),
    ],
];
