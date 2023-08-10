<?php

require(__DIR__.'/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();
$dotenv->required([
    'DEBUG',
    'ENV',
    'DATA_FILE_NAME',
]);

defined('YII_DEBUG') or define('YII_DEBUG', (bool)$_SERVER['DEBUG']);
defined('YII_ENV') or define('YII_ENV', $_SERVER['ENV']);

require(__DIR__.'/../vendor/yiisoft/yii2/Yii.php');

Yii::setAlias('app', dirname(__DIR__));

$config = require(__DIR__.'/../config/main.php');

(new yii\web\Application($config))->run();
