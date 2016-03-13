<?php
define('APP_PATH', __DIR__.'/../application');
define('TPL_PATH', APP_PATH.'/views');
define('LIB_PATH', APP_PATH.'/library');
define('CONF_PATH', __DIR__.'/../conf');
define('ENV', 'dev');

use Yaf\Application;

$app = new Application(CONF_PATH.'/app.ini');

session_start();
echo \Seaslog::getDatetimeFormat();
echo '<br/>';
echo \Seaslog::setDatetimeFormat('%Y-%m-%d %H:%M:%S');
echo \Seaslog::getDatetimeFormat();
echo '<br/>';
echo \Seaslog::debug('one person comes, sessionID: {sessionid}', array('{sessionid}' => session_id()));
echo '<br>';
$app->bootstrap()->run();
