<?php

use Orion\Facades\Orion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(['as' => 'api.'], function() {
    Orion::resource('users', UserController::class);
});
