<?php

declare(strict_types=1);

namespace App\Engine\Core\Auth;

use App\Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    protected bool $authorized = false;
    protected ?string $hash_user;

    public function authorized(): bool
    {
        return $this->authorized;
    }

    public function authorize($user): void
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    public function logOut(): void
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    /**
     * @return string salt
     */
    public static function salt(): string
    {
        return (string) rand(10000000, 99999999);
    }

    /**
     * @param $password
     * @param string $salt
     * @return string encryptPassword
     */
    public static function encryptPassword($password, string $salt = ''): string
    {
        return hash('sha256', $password . $salt);
    }

    public function hashUser()
    {
        return Cookie::get('auth_user');
    }
}
