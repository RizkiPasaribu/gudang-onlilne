<?php
return [
    'doctrine' => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host'     => 'mysql5.6',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'password',
                    'dbname'   => 'gudang-online',
                    'charset'  => 'utf8'
                ],
            ],
        ],
    ],
];
