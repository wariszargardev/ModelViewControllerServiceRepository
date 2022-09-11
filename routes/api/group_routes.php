<?php

use App\Http\Controllers\Api\Course\CourseController;
use App\Http\Controllers\Api\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('courses',CourseController::class);
Route::apiResource('student',StudentController::class);
Route::prefix('/custom')->group(function (){
    Route::middleware(['a','b'])->group(function (){
        Route::namespace('Admin')->group(function (){

        });
    });
});

