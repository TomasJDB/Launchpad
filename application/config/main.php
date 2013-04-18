<?php
// Load the helper functions
require_once( dirname(__FILE__) . '/../components/helpers.php');

// Set up environment based options
switch( APPLICATION_ENVIRONMENT) {
	
    case 'production':
        // For live use
		$db_info = [
                'connectionString' => 'mysql:host=127.0.0.1;dbname=rbm_launchpad',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
        ];
        $mongoInfo = [
            'host' => "localhost",
            'curly' => [ 
                'username' => "root",
                'password' => "",
                'dbname'   => "rbm_curly"
            ]
        ];
        break;  
    case 'stage':
        // For local development use
        $db_info = [
                'connectionString' => 'mysql:host=192.168.1.74;dbname=rbm_launchpad_stage',
                'username' => 'rbm_launchpad',
                'password' => 'vXD357Ucu2XZxQrf',
                'charset' => 'utf8',
        ];
        $mongoInfo = [
            'host' => "10.181.50.250",
            'curly' => [ 
                'username' => "rbm_curly",
                'password' => "V6BR281y0g34785#",
                'dbname'   => "rbm_curly_stage"
            ]
        ];
        break;
    case 'development':
        // For local development use
        $db_info = [
                'connectionString' => 'mysql:host=192.168.1.74;dbname=rbm_launchpad_dev',
                'username' => 'rbm_launchpad',
                'password' => 'vXD357Ucu2XZxQrf',
                'charset' => 'utf8',
        ];
        $mongoInfo = [
            'host' => "10.181.50.250",
            'curly' => [ 
                'username' => "rbm_curly",
                'password' => "V6BR281y0g34785#",
                'dbname'   => "rbm_curly_dev"
            ]
        ];
        break;
    case 'sandbox':
        // For local development use
        $db_info = [
                'connectionString' => 'mysql:host=127.0.0.1;dbname=rbm_launchpad',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
        ];
        $mongoInfo = [
            'host' => "localhost",
            'curly' => [ 
                'username' => "root",
                'password' => "",
                'dbname'   => "rbm_curly"
            ]
        ];
        break;    
}
		

/*
 * Set the routes
 */
$routes = [
                // Resource Routes
                '/js/<file:[\w\.\-]+>' => 'asset/javascript/file/<file>',
                '<template:[\w]{3}_[\d]{3}>/js/<file:[]\w\.\-]+>' => 'asset/javascript/file/<file>',
                '/css/<file:[\w\.\-]+>' => 'asset/css/file/<file>',
                '<template:[\w]{3}_[\d]{3}>/css/<file:[\w\.\-]+>' => 'asset/css/file/<file>',
                '/font/<file:[\w\.\-]+>' => 'asset/font/file/<file>',
                '<template:[\w]{3}_[\d]{3}>/font/<file:[\w\.\-]+>' => 'asset/font/file/<file>',
                '/img/<file:[\w\.\-]+>' => 'asset/image/file/<file>',
                '<template:[\w]{3}_[\d]{3}>/img/<file:[\w\.\-]+>' => 'asset/image/file/<file>',
                // Logic Routes
               ''=>'index/index/action/index',
               '<template:[\w]{3}_[\d]{3}>' => 'index/index/action/index',
               '<template:[\w]{3}_[\d]{3}>/<action:[\w\-]+>*' => 'index/index/action/<action>',
                // Basic routes
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
];

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
	'basePath'=>APPLICATION_PATH,
	'name'=>'Launchpad',

	// preloading 'log' component
	'preload'=>['log'],

	// autoloading model and component classes
	'import'=>[
		'application.models.*',
		'application.components.*',
	],

	'modules'=>[
		// uncomment the following to enable the Gii tool
/*		
		'gii'=>[
			'class'=>'system.gii.GiiModule',
			'password'=>'P@ssword1',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>['127.0.0.1','::1'],
		],
*/	],

	// application components
	'components'=>[
		'user'=>[
			// enable cookie-based authentication
		],
		'session'=>[
            'autoStart'=>true,
            'sessionName'=>'SID',
            'timeout'=>1440,
        ],
        // Set the default controller to the IndexController
        'defaultController'=>'index',
        // uncomment the following to enable URLs in path-format
        'urlManager'=>[
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>$routes,
        ],
		'db'=>$db_info,
		'errorHandler'=>[
			// use 'site/error' action to display errors
            'errorAction'=>'error/error',
        ],
		'log'=>[
			'class'=>'CLogRouter',
			'routes'=>[
				[
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				],
				// uncomment the following to show log messages on web pages
				/*
				[
					'class'=>'CWebLogRoute',
				],
				*/
			],
		],
	],

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>[
		// this is used in contact page
		'adminEmail'=>'admin@realbrightmedia.com',
        'mongodb'=>$mongoInfo
	]
];