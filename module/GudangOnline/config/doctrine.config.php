<?php
return [
    'doctrine' => [
        'driver' => [
            'gudangonline_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/orm']
            ],
            'orm_default' => [
                'drivers' => [
                    'GudangOnline\Entity' => 'gudangonline_entity',
                ]
            ]
        ],
    ],
];
