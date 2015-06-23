
<?php
$on = 1;
if ($on == 1) {
    error_reporting(1);
    ini_set('display_errors', 1);
}


require 'libs/bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/View.php';
require 'libs/Jyll.php';

require 'config/db.php';

Session::init();
$bootstrap = new Bootstrap();
