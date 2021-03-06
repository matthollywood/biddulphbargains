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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => [
				'name' => '_biddulphbargains',
				'domain' => '.biddulphbargains.co.uk',
				'path' => '/',
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
		'authManager' =>
			[
				'class' => 'yii\rbac\DbManager',
				'defaultRoles' => ['guest'],
			],
	    'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>array(
                '<controller:\w+>/<action:\w+>/<id:[a-zA-Z0-9-]+>' => '<controller>/<action>', '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            )
        ],
    ],
    'params' => $params,
];

