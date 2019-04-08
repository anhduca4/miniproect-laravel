<?php
namespace Tests\Feature\Api\V1;

use App\Repositories\Eloquent\UserRepository;

class TestBaseAuth extends TestBase
{
    /** @var App\Repositories\UserRepositoryInterface UserRepository */
    protected $userRepository;

    public $headers = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository           = new UserRepository();
        $user                           = $this->userRepository->find(1);
        $token                          = '';
        $token                          = $user->createToken($this->clientOauth->id)->accessToken;
        $this->headers['Accept']        = 'application/json';
        $this->headers['Authorization'] = 'Bearer '.$token;
    }
}
