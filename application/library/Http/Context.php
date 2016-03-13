<?php

namespace Http;

use Yaf\Application;

class Context
{
    public static function query($key, $default)
    {
        return Application::app()->getDispatcher()->getRequest()->getQuery($key, $default);
    }

    public static function queryString($key, $default = '')
    {
        return strval(Application::app()->getDispatcher()->getRequest()->getQuery($key, $default));
    }

    public static function queryInt($key, $default = 0)
    {
        return intval(Application::app()->getDispatcher()->getRequest()->getQuery($key, $default));
    }

    public static function post($key, $default)
    {
        return Application::app()->getDispatcher()->getRequest()->getPost($key, $default);
    }

    public static function postString($key, $default = '')
    {
        return strval(Application::app()->getDispatcher()->getRequest()->getPost($key, $default));
    }

    public static function postInt($key, $default = 0)
    {
        return intval(Application::app()->getDispatcher()->getRequest()->getPost($key, $default));
    }
}
