<?php

namespace App\Engine\Helper;

class Common
{
    public static function isPost(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }

        return false;
    }
    public static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getPathUri(): string
    {
        $pathUri = $_SERVER['REQUEST_URI'];

        if ($position = strpos($pathUri, '?')) {
            $pathUri = substr($pathUri, 0, $position);
        }

        return $pathUri;
    }
}
