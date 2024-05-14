<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginAuth']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout');
    });
});
