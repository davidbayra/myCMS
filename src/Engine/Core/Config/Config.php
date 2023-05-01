<?php

namespace App\Engine\Core\Config;

use Exception;

class Config
{
    /**
     * @throws Exception
     */
    public static function item($key, $group = 'items')
    {
        $groupItems = static::file($group);

        return $groupItems[$key] ?? null;
    }

    /**
     * @throws Exception
     */
    public static function file($group): bool|array
    {
        $path = APP_DIR . $_SERVER['ENV'] . '/Config/' . $group . '.php';

        if (is_file($path)){
            return require_once $path;
        } else {
            throw new Exception(sprintf('Cannot load config from file, file <strong>%s<strong> does not exist.', $path));
        }

        return false;
    }
}