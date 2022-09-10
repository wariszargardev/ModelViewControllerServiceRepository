<?php

use App\Http\Controllers\Api\Course\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index']);
Route::get('get/{id}', [CourseController::class, 'show']);
Route::post('save', [CourseController::class, 'store']);
Route::post('update/{id}', [CourseController::class, 'updateCourse']);
Route::delete('delete/{id}', [CourseController::class, 'deleteCourse']);
