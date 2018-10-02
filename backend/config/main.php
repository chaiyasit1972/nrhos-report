<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'homeUrl' =>  '/administrator',
    'aliases' => [
		'@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
    	],    

    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
	    'baseUrl' => '/administrator'		
        ],        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
     'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '../../../',
            'scriptUrl'=>'/yii2-advanced/frontend/web/index.php',
            'enablePrettyUrl' => false,
            'showScriptName' => true,
     ],
     
    ],
    'params' => $params,
];
