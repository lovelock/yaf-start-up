<?php
define('APP_PATH', __DIR__.'/../application');
define('TPL_PATH', APP_PATH.'/views');
define('LIB_PATH', APP_PATH.'/library');
define('CONF_PATH', __DIR__.'/../conf');
define('ENV', 'dev');

use Yaf\Application;

$app = new Application(CONF_PATH.'/app.ini');

$app->bootstrap()->run();
