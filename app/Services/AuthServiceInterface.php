<?php
namespace App\Services;

interface AuthServiceInterface extends BaseServiceInterface
{
    /**
     * Login with email or phone number.
     *
     * @param string $username
     * @param string $password
     *
     * @return App\Models\User|null
     */
    public function login($username, $password);
}
