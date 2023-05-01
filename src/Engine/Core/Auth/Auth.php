<?php

declare(strict_types=1);

namespace App\Engine\Core\Auth;

use App\Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    protected bool $authorized = true;
    protected ?string $user;

    public function authorized(): bool
    {
        return $this->authorized;
    }
    public function authorize($user): void
    {
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);
        $this->authorized = true;
        $this->user = $user;
    }

    public function logOut($user): void
    {
        Cookie::delete('auth.authorized', true);
        Cookie::delete('auth.user', $user);
        $this->authorized = false;
        $this->user = null;
    }

    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }

    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }
}