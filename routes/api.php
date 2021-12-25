<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
//    Route::group(['prefix'=>'auth'], function () {
//        Route::post('register', [RegisteredUserController::class, 'store']);
//        Route::post('login', [AuthenticatedSessionController::class, 'store']);
//        Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);
//    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('{id}', [ProfileController::class, 'indexAPI']);
        Route::post('{id}', [ProfileController::class, 'updateAPI']);
    });
    Route::group(['prefix' => 'publications'], function () {
        Route::get('', [PublicationController::class, 'indexAPI']);
        Route::get('{id}', [PublicationController::class, 'getPublicationAPI']);
        Route::delete('{id}', [PublicationController::class, 'deleteAPI']);
    });
    Route::get('categories',[CategoryController::class,'index']);
});
