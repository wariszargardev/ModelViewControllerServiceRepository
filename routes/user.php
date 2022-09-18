<?php

use App\Http\Controllers\Passport\UserLoginController;
use Illuminate\Support\Facades\Route;

Route::post('user/login',[UserLoginController::class, 'userLogin'])->name('user.login');

// AUTHENTICATION API FOR USE
Route::group( ['prefix' => 'user','middleware' => ['auth:user-api','scopes:user'] ],function(){
    Route::post('dashboard',[UserLoginController::class, 'userDashboard']);
});
