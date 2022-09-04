<?php

use App\Http\Controllers\SanctumController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function (){
});

Route::post('createToken', [SanctumController::class, 'issueToken']);
