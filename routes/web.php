<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Payment\PaymentController;
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
Route::get('/migrate', [\App\Http\Controllers\MigrateController::class, 'index']);
Route::get('/role-seeder', [\App\Http\Controllers\MigrateController::class, 'role_seeder']);
Route::get('/user-seeder', [\App\Http\Controllers\MigrateController::class, 'user_seeder']);
Route::get('/category-seeder', [\App\Http\Controllers\MigrateController::class, 'category_seeder']);


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/category/{id}/publications', [PublicationController::class,'publicationsByCategory'])->name('category-publications');
Route::get('publication/{id}/payment', [PaymentController::class, 'index'])->name('payment');

Route::group(["middleware" => "auth", "prefix" => "/profile", "as" => "profile."], function (){
    Route::get('', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'getEdit'])->name('edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('update-post');
    Route::get('/publish', [PublicationController::class, 'index'])->name('publish');
    Route::post('/publish-store', [PublicationController::class, 'store'])->name('publish-create');
    Route::get('/publications/{id}', [PublicationController::class, 'getPublication'])->name('get-publication');
    Route::get('/publications/{id}/edit', [PublicationController::class, 'getEdit'])->name('get-publication-edit');
    Route::post('/publications/{id}/edit', [PublicationController::class, 'update'])->name('update-publication');
    Route::get('/publications/{id}/delete', [PublicationController::class, 'delete'])->name('delete-publication');
});

Route::group(["middleware" => "auth", "as" => "publications."], function (){

});


require __DIR__.'/auth.php';









