<?php

namespace Helper;

use Yaf\Config\Ini;

/**
 * A wrapper Yaf\Config\Ini for easy use.
 */
class Conf
{
    /**
     * Fetch configuration from ini files.
     * Assume a file named foo.ini whose content is like bellow:
     *
     * [product]
     * foo.bar.string = 'I am a string'
     * foo.bar.another = 'I am another string'
     * [dev:product]
     * foo.bar.another = 'I am the another string in dev environment'
     *
     * 1. Conf::get('foo.bar') will return array('string' => 'I am a string', 'another' => 'I am another string') or array('string' => 'I am a string', 'another' => 'I am another string in dev environment') depending on the ENV setting.
     * 2. Conf::get('foo.bar.antoher') will return the string 'I am another string' or 'I am the another string in dev environment' depending on the ENV setting.
     *
     * @param string $key
     *
     * @return array | string
     */
    public static function get($key)
    {
        $filename = CONF_PATH.'/'.explode('.', $key)[0].'.ini';

        if (is_file($filename) && is_readable($filename)) {
            $ini = new Ini($filename, ENV);
            $config = $ini->get($key);
            if (is_a($ini, 'Yaf\Config\Ini', false)) {
                $config = $ini->toArray();
            }
        } else {
            $config = null;
        }

        return $config;
    }
}
