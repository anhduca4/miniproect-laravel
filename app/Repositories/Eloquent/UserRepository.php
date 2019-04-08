<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends RelationModelRepository implements UserRepositoryInterface
{
    protected $querySearchTargets = [
        'email',
        'username',
    ];

    public function getBlankModel()
    {
        return new User();
    }

    public function findByUsernameOrEmailOrPhone($username)
    {
        return $this->getBlankModel()
            ->where('email', $username)
            ->orWhere('phone_number', $username)
            ->orWhere('username', $username)
            ->firstOrFail();
    }
}
