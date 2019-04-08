<?php
namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Services\AuthServiceInterface;
use App\Traits\PassportToken;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;
use League\OAuth2\Server\AuthorizationServer;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoginController extends Controller
{
    use HandlesOAuthErrors, PassportToken;

    /** @var League\OAuth2\Server\AuthorizationServer */
    protected $server;

    /** @var App\Services\AuthServiceInterface AuthService */
    protected $authService;

    /**
     * @param AuthorizationServer $server
     */
    public function __construct(
        AuthorizationServer $server,
        AuthServiceInterface $authService
    ) {
        $this->server      = $server;
        $this->authService = $authService;
    }

    /**
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $user  = $this->authService->login($request->username, $request->password);
            // $user = $this->userReposs->find(['id' => 1]);
            $token = $this->getBearerTokenByUser($user, $request->client_id, false);

            return response()->success(compact('user', 'token'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage().$e);
            throw new AccessDeniedHttpException('Đăng nhập không thành công, vui lòng kiểm tra lại email hoặc số điện thoại và mật khẩu');
        }
    }
}
