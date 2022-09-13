<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\UserController;

Route::get('front-users',[UserController::class,'frontUsers']);
Route::get('front-home', [HomeController::class, 'index'])->name('home');
