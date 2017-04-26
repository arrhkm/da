<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('booster', dirname(__FILE__).'/../extensions/booster');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'theme'=>'booster',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Daily Activity',
	'defaultController'=>'login/login',
	// preloading 'log' component
	'preload'=>array(
		'booster',
		'log'
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.ECompositeUniqueValidator.extensions.ECompositeUniqueValidator', // 'ext.*', // <---- this works too
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'generatorPaths'=>array(
				'booster.gii',
			),
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','192.168.100.26'),
		),
		
	),

	// application components
	'components'=>array(
		'booster'=>array(
        	'class'=>'booster.components.Booster',
        	'responsiveCss' => true,
            'fontAwesomeCss' => TRUE,
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'application.components.EWebUser',//Load web USER
		),

		/**Component Validasi Unique
		*/
		'ECompositeUniqueValidator'=>array(
        	'class' => 'ext.ECompositeUniqueValidator.components.ECompositeUniqueValidator',
        ),
			
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
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dailyactivity',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'Lintech32#',
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
