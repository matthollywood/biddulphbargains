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
                   'transport' => [
             'class' => 'Swift_SmtpTransport',
             'host' => 'imap.1and1.co.uk', 
             'username' => 'matthew.jones@biddulphbargains.co.uk',
             'password' => 'royksopp1',
             'port' => '25', // Port 25 is a very common port too
             // It is often used, check your provider or mail server specs
         ],
            'useFileTransport' => false,
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
