<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    // 'language' => 'id', // still using Bahasa Indonesia
    'name' => 'Tazkiyah Laundry',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'urlManager' => [
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => false,
            'rules' => [
                //...
            ]
        ],
        'formatter' => [
            'dateFormat' => 'Y-m-d H:i:s',
        ]
    ],
];
