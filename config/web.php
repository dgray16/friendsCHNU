<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'name' => '«Об’єднання Випускників та Друзів Чернівецького національного університету імені Юрія Федьковича»',
    'language' => 'uk',
    'sourceLanguage' => 'en-EN',

    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'class' => 'pjhl\multilanguage\components\AdvancedRequest',
            'cookieValidationKey' => 'fsdfasdfasdflasdfjfsdlkfhsdjkfhsdkfjhsdk'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'multilanguageHideDefaultPrefix' => true,
            'class' => 'pjhl\multilanguage\components\AdvancedUrlManager',
            'rules' => [

            ]
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\user\User',
            'enableAutoLogin' => true,
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache'
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-En',
                ],'profile*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-En',
                ]
            ],
        ],
    ],

    'modules' => [
        'admin' => 'app\modules\admin\Module',
        'profile' => 'app\modules\profile\Module',
        'graduates' => 'app\modules\graduates\Module',
        'search' => 'app\modules\search\Module',
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
