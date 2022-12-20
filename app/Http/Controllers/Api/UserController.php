<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Orion\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Orion Model Configuration.
     */
    protected $model = User::class;
}
