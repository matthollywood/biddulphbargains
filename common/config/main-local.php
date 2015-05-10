<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db574676647.db.1and1.com;dbname=db574676647',
            'username' => 'dbo574676647',
            'password' => 'royksopp1',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Disable index.php
        'showScriptName' => true,
        // Disable r= routes
        'enablePrettyUrl' => true,
        'rules' => array(
		'dashboard' => 'site/index',

    'POST <controller:\w+>s' => '<controller>/create',
    '<controller:\w+>s' => '<controller>/index',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ),
        ],		
		
    ],
];
