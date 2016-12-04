<?php
return [

        'multi' => [
            'admin' => [
                'driver' => 'eloquent',
                'model' => 'App\Admin',
            ],
            'client' => [
                'driver' => 'eloquent',
                'model' => 'App\User',
            ],
            'salon' => [
                'driver' => 'eloquent',
                'model' => 'App\Salons',
                'email' => 'client.emails.password',
            ]
        ],

        'password' => [
                'email' => 'emails.password',
                'table' => 'password_resets',
                'expire' => 60,
            ],

    ];