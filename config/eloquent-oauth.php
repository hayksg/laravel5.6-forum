<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '453269735130059',
            'client_secret' => 'fd8bae121af9a13de7274468b7124d5b',
            'redirect_uri' => url('/') . '/facebook/redirect',
            'scope' => [],
        ],
        'google' => [
            'client_id' => '520683399472-1lctnldntn4p4b8dv49cs71vvtn2j45q.apps.googleusercontent.com',
            'client_secret' => 'sAl_L8yiSbQ3g3D3R5m7OuXx',
            'redirect_uri' => url('/') . '/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => 'c746bb8f9dd7badb192d',
            'client_secret' => '313f7ab86c02fe3cfa27467cc3c4dfb925a416e5',
            'redirect_uri' => url('/') . '/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
