<?php
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $protocol = 'http://';
} else {
    $protocol = 'https://';
}
$base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/';
// echo $base_url;

// define('HOMEPAGE', 'http://192.168.1.36/Ksiega/'); 
define('HOMEPAGE', $base_url); 
define('ERRORPAGE', HOMEPAGE .'error');
define('logginerrorpage', HOMEPAGE . 'error/loggin');
define('DEFAULTPAGE', 'homepage');
define('DEFAULTPAGEPATH', 'index');
define('sessionname', 'udmjrhXB');
define('imagelink', HOMEPAGE . 'image/');
define('loginpage', 'login/index');


define('dbtype', 'mysql');
define('dbserver', 'localhost');
define('dbuser', 'root');
define('dbpass', '123456');
define('dbname', 'JyllFramework');
