<?php

use App\Http\Controllers\Passport\DoctorLoginController;
use Illuminate\Support\Facades\Route;

Route::post('doctor/login',[DoctorLoginController::class, 'doctorLogin'])->name('doctor.login');

Route::group( ['prefix' => 'doctor','middleware' => ['auth:doctor-api','scopes:doctor'] ],function(){

    Route::post('dashboard',[DoctorLoginController::class, 'doctorDashboard'])->name('doctor.dashboard');
});
