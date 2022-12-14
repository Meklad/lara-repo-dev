<?php

namespace Meklad\LaraRepo\Repositories;

use App\Models\User;
use Meklad\LaraRepo\LaraRepoBaseRepository;

class UserRepository extends LaraRepoBaseRepository
{
    /**
     * Configure User Repository the Model
     *
     * @return string
     */
    public function model() : string
    {
        return User::class;
    }
}
