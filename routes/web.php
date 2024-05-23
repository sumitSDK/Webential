<?php

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

//login and registration
Auth::routes();
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('user-login', [App\Http\Controllers\Auth\RegisterController::class, 'userLogin'])->name('login.user'); 

//dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/request/{id}', [App\Http\Controllers\HomeController::class, 'requestAction'])->name('user.request');
Route::post('/requests/accept/{id}', [App\Http\Controllers\HomeController::class, 'acceptRequest'])->name('requests.accept');

Route::get('/chat/{id}', [App\Http\Controllers\ChatController::class, 'showChat'])->name('chat');
Route::post('chat/send-message', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send-message');

//pusher auth
Route::post('pusher/auth', [App\Http\Controllers\ChatController::class, 'PusherAuthorization'])->name('pusher.auth');