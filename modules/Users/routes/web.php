<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UserController;

Route::group([], function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
});
