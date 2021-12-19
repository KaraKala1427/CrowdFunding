<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
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
    return view('pages.main');
});

//Route::get('/main', function () {
//    return view('pages.main');
//});

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/publish', [PublicationController::class, 'index'])->middleware('auth')->name('profile.publish');

require __DIR__.'/auth.php';









