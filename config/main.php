<?php

use yii\web\Response;

return [
    'id' => 'app',
    'name' => 'app',
    'basePath' => dirname(__DIR__),
    'runtimePath' => dirname(__DIR__).'/runtime',
    'controllerNamespace' => 'app\controllers',
    'components' => [
        'assetManager' => [
            'bundles' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'data',
                    'pluralize' => false,
                    'only' => [
                        'index',
                    ],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => false,
        ],
        'response' => [
            'formatters' => [
                Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
        ],
        'log' => [
            'targets' => [
                'error' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/error.log',
                ],
            ],
        ],
    ],
];
