<?php
namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\UserUpdateRequest;
use App\Repositories\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
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

    /**
     * Get user infomation.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
        return response()->success(['user' => $request->user()]);
    }

    /**
     * Update user infomation.
     *
     * @param App\Http\Requests\Auth\UserUpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request)
    {
        $userUpdate = $request->user();
        $updateOnly = [
            'birth_day',
            'name',
            'address',
            'phone_number',
        ];
        $update               = $request->only($updateOnly);
        $update['updated_at'] = Carbon::now();
        $user                 = $this->userRepository->update($userUpdate, $update);

        return response()->success(['user' => $user]);
    }

    /**
     * Logout.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->success(['message' => 'success']);
    }
}
