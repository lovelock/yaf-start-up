<?php

class IndexController extends BaseController
{
    public function indexAction()
    {
        echo '依赖注入';
        echo '<br>';
        echo '依赖容器';
        echo '<br>';
        echo '反射';
        echo '<br>';
        exit;
    }
}
