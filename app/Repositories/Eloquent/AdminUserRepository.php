<?php
namespace App\Repositories\Eloquent;

use App\Models\AdminUser;
use App\Repositories\AdminUserRepositoryInterface;

class AdminUserRepository extends RelationModelRepository implements AdminUserRepositoryInterface
{
    protected $querySearchTargets = [
        'name',
        'email',
        'profile_image_id',
        'phone',
        'address',
        'created_at',
        'updated_at',
    ];

    public function getBlankModel()
    {
        return new AdminUser();
    }
}
