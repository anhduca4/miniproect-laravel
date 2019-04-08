<?php
namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\CreateRequest;
use App\Http\Requests\V1\User\IndexRequest;
use App\Http\Requests\V1\User\UpdateRequest;
use App\Repositories\UserRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Get list of users.
     *
     * @param App\Http\Requests\V1\User\IndexRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        $limit     = $request->limit();
        $order     = $request->order();
        $direction = $request->direction();
        $users     = $this->userRepository->allByFilterPagination([], $limit, $order, $direction);

        return response()->success($users);
    }

    /**
     * Create new user.
     *
     * @param App\Http\Requests\V1\User\CreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only([
            'username',
            'password',
            'name',
            'email',
            'birth_day',
            'address',
            'phone_number',
        ]);
        $user = $this->userRepository->create($data);

        return response()->success($user);
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            throw new NotFoundHttpException('Can not find user.');
        }

        return response()->success($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            throw new NotFoundHttpException('Can not find user.');
        }
        $data = $request->only([
            'password',
            'name',
            'birth_day',
            'address',
        ]);
        $user = $this->userRepository->update($user, $data);

        return response()->success($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            throw new NotFoundHttpException('Can not find user.');
        }

        return response()->success([]);
    }
}
