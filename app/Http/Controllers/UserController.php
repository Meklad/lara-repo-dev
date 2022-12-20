<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::first();
        return view('users.index', [
            'users' => SpladeTable::for(User::class)
                ->column('name')
                ->column('email')
                ->paginate(15),
            'user' => $user
        ]);
    }
}
