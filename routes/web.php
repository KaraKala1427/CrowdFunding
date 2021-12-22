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

Route::group(["middleware" => "auth", "prefix" => "/profile", "as" => "profile."], function (){
    Route::get('', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'getEdit'])->name('edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('update-post');
    Route::get('/publish', [PublicationController::class, 'index'])->name('publish');
    Route::post('/publish-store', [PublicationController::class, 'store'])->name('publish-create');
});

require __DIR__.'/auth.php';









