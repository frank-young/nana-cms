<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',  
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [  
               'class' => 'Swift_SmtpTransport',  
               'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样
               'username' => 'yangjunalns@qq.com',  
               'password' => 'jxbqtbonmoobbejd', 
               'port' => '25',//25
               'timeout' => '5',
               'encryption' => 'tls',  
               ],   
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'basePath' => '@webroot/frontend/web/assets',
            'baseUrl' => '@web/frontend/web/assets'
        ],
    ],
    'params' => $params,
];
