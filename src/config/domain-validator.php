<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cache Storage
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used.
    | Available caching connections can be found in your applications cache.php
    | config.
    |
    | Refer to the docs for more information: https://laravel.com/docs/cache
    |
    | Expected: string|null
    |
    */

    'cache_driver' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Storage Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used.
    | Available caching connections can be found in your applications cache.php
    | config.
    |
    | Refer to the docs for more information: https://laravel.com/docs/cache
    |
    | Expected: string|null
    |
    */

    'storage_driver' => env('STORAGE_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Public Suffix List URI
    |--------------------------------------------------------------------------
    |
    | This option controls the default location the package will use to fetch
    | a fresh PSL list.
    |
    | Expected: string|null
    |
    */

    'public_suffix' => [
        'list_url' => 'https://publicsuffix.org/list/public_suffix_list.dat',
        'storage_name' => 'public_suffix_list.dat',
        'cache_name' => 'public_suffix_list.dat',
    ],

    /*
    |--------------------------------------------------------------------------
    | Top Level Domain list URI
    |--------------------------------------------------------------------------
    |
    | This option controls the default location the package will use to fetch
    | a fresh TLD list.
    |
    | Expected: string|null
    |
    */
    'iana_tld' => [
        'list_url' => 'https://data.iana.org/TLD/tlds-alpha-by-domain.txt',
        'storage_name' => 'tlds-alpha-by-domain.txt',
        'cache_name' => 'tlds-alpha-by-domain.txt',
    ],
];
