<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Meklad\LaraRepo\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * User controller constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(public UserRepository $repository) {}

    /**
     * Get all users.
     *
     * @return Response
     */
    public function index()
    {
        return response($this->repository->all(),200);
    }

    /**
     * Create new user
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return response($this->repository->create($request),200);
    }

    /**
     * Update User.
     *
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function update(User $user, Request $request)
    {
        return response($this->repository->update($user, $request),200);
    }

    /**
     * Destroy User.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        return response($this->repository->delete($user),200);
    }
}
