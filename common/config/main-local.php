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
		'session' => [
			'savePath' => 'common\session',
			'cookieParams' => [
			'path' => '/',
			'domain' => '.biddulphbargains.co.uk',
			],
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => [
				'name' => 'biddulphbargains',
				'domain' => '.biddulphbargains.co.uk',
				'path' => '/',
				],
			],
		],
];