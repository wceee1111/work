<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev',true);
//'dev'

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';
/*$app = new \yii\web\Application($config);
$app->language = "zh-CN";//设置中国区的语言
$app->run();*/
(new yii\web\Application($config))->run();
