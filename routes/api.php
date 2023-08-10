<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\NoteController;
use App\Http\Controllers\V1\RegisterController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function (){

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');



    Route::group([
        'middleware' => ['api', 'auth'],
        'prefix' => 'auth'
    ], function ($router) {
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.get');
        Route::post('/profile', [UserController::class, 'update'])->name('user.profile.update');
        Route::post('/profile/password', [UserController::class, 'changePassword'])->name('user.profile.change.password');
        Route::delete('/profile', [UserController::class, 'delete'])->name('user.profile.delete');

        Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
        Route::post('/refresh', [AuthController::class, 'refresh'])->name('user.token.refresh');

        Route::get('/notes', [NoteController::class, 'index']);
        Route::get('/notes/{id}', [NoteController::class, 'show']);
        Route::post('/notes', [NoteController::class, 'store']);
        Route::patch('/notes/{id}', [NoteController::class, 'update']);
        Route::delete('/notes/{id}', [NoteController::class, 'delete']);

    });

});



