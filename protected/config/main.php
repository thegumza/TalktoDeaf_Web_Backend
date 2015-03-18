<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('yiibootflat', realpath(__DIR__ . '/../extensions/yiibootflat'));
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		
	'name'=>'พูดผ่านภาษามือ',
    'defaultController'=>'site/login',
	'timeZone'=>'Asia/Bangkok',
	'sourceLanguage'=>'th',
	'language'=>'th',
	'theme'=>'hebo',
	// preloading 'log' component
	'preload'=>array('log'),
		 'aliases' => array(
				'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
		), 
		
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		 'bootstrap.widgets.*',
		 'bootstrap.helpers.TbHtml',
			'bootstrap.helpers.TbHtml',
			'bootstrap.helpers.TbArray',
			'bootstrap.behaviors.TbWidget',  
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		 'bootstrap' => array(
			'class' => 'bootstrap.components.TbApi',
		),
        'yiibootflat' => array(
            'class' => 'yiibootflat.components.YbfComponent'),
			/* 'booster' => array(
					'class' => 'path.alias.to.booster.components.Booster',
			), */
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/* 'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=talktodeaf_db',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);