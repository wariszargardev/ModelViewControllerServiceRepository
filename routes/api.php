<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Passport\UserLoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/register', [UserLoginController::class, 'userRegister']);
Route::post('user/login', [UserLoginController::class, 'userLogin']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [UserLoginController::class, 'logout']);
    Route::get('get-user', [UserLoginController::class, 'userDetail']);
});
