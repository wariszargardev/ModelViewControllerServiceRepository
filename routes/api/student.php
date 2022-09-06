<?php

use App\Http\Controllers\Api\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index']);
Route::post('save', [StudentController::class, 'store']);
Route::get('get/{id}', [StudentController::class, 'getStudent']);
Route::post('update/{id}', [StudentController::class, 'updateStudent']);
Route::delete('delete/{id}', [StudentController::class, 'deleteStudent']);
