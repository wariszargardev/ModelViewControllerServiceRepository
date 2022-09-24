<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\WebNotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['ip.restrict'])->group(function (){

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
    Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
    Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
    Route::get('base-64-image', [ImageUploadController::class, 'imageUpload']);
    Route::get('image-to-base64', [ImageUploadController::class, 'imageToBase64']);

});
