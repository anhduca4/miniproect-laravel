<?php
namespace App\Repositories;

interface UserRepositoryInterface extends RelationModelRepositoryInterface
{
    /**
     * Find user by user name or email or password.
     *
     * @param string $username
     *
     * @return App\Models\User || null
     */
    public function findByUsernameOrEmailOrPhone($username);
}
