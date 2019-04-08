<?php
namespace App\Services\Production;

use App\Repositories\UserRepositoryInterface;
use App\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AuthService extends BaseService implements AuthServiceInterface
{
    /** @var App\Repositories\UserRepositoryInterface UserRepository */
    protected $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function login($username, $password)
    {
        $user = $this->userRepository->findByUsernameOrEmailOrPhone($username);
        if (!Hash::check($password, $user->password)) {
            throw new AccessDeniedHttpException('auth.failed');
        }

        return $user;
    }
}
