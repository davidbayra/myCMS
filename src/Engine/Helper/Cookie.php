<?php

namespace App\Engine\Helper;

class Cookie
{
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() . $time, '/');
    }

    public static function get($key)
    {
        return $_COOKIE[$key] ?? null;
    }

    public static function delete($key)
    {
        if (isset($_COOKIE[$key])){
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}
