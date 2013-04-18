<?php
// Set the application environment
defined('APPLICATION_ENVIRONMENT')
    or define( 'APPLICATION_ENVIRONMENT', (getenv('APPLICATION_ENVIRONMENT') ? getenv('APPLICATION_ENVIRONMENT') : 'production') );

defined('APPLICATION_PATH')
    or define('APPLICATION_PATH', dirname(__FILE__).'/../application/');

defined('CIPHER_KEY')
    or define('CIPHER_KEY', '_g1mm3g1mm3_');
    
defined('APPLICATION_MODULE')
    or define( 'APPLICATION_MODULE', (getenv('APPLICATION_MODULE') ? getenv('APPLICATION_MODULE') : 'shell' ) );

$ip_addr = null;
if( isset($_REQUEST['ip_addr']) and filter_var($_REQUEST['ip_addr'], FILTER_VALIDATE_IP) ) {
    $ip_addr = $_REQUEST['ip_addr'];
} else if( isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) and filter_var($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'], FILTER_VALIDATE_IP) ) {
    $ip_addr = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
} else {
    $ip_addr = $_SERVER['REMOTE_ADDR'];
}

defined('REAL_IP')
    or define ( 'REAL_IP', $ip_addr );

$ip_addr = null;
if( isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) and filter_var($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'], FILTER_VALIDATE_IP) ) {
    $ip_addr = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
} else {
    $ip_addr = $_SERVER['REMOTE_ADDR'];
}

defined('REMOTE_IP')
    or define ( 'REMOTE_IP', $ip_addr );

// change the following paths if necessary
$yii='C:\vhosts\aditional_files\yii\framework\yii.php';
$config=dirname(__FILE__).'/../application/config/main.php';

if( APPLICATION_ENVIRONMENT != 'production' ) {
    // remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}
require_once($yii);
Yii::createWebApplication($config)->run();
