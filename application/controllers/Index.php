<?php

use Yaf\Controller_Abstract;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Resources\Database;
use Helper\Conf;
use Resources\Redis;

class IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $result = Redis::set('ggggg', 'ttttt');
        var_dump($result);
        $int = Redis::get('ggggg');
        var_dump($int);
        exit;
    }
}
