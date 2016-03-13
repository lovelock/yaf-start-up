<?php

use Yaf\Bootstrap_Abstract;
use Yaf\Dispatcher;
use Yaf\Config\Ini;
use Yaf\Registry;
use Yaf\Loader;
use Yaf\Application;
use Lovelock\Yaf\Twig;

/**
 * Class: Bootstrap
 *
 * Execute before anything happens
 * @see Bootstrap_Abstract
 */
class Bootstrap extends Bootstrap_Abstract
{
    public function _initLoader(Dispatcher $dispatcher)
    {
    }

    public function _initConfig(Dispatcher $dispatcher)
    {
    }

    public function _initComposerAutoloader(Dispatcher $dispatcher)
    {
        $autoloader = APP_PATH.'/../vendor/autoload.php';
        if (is_file($autoloader) && is_readable($autoloader)) {
            Loader::import($autoloader);
        }
    }

    public function _initView(Dispatcher $dispatcher)
    {
        $config = Application::app()->getConfig();
        $dispatcher->setView(new Twig(APP_PATH.'/views', $config->twig->toArray()));
    }

    public function _initPlugin(Dispatcher $dispatcher)
    {
    }
}
