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

//Route::get('/catalog', function () {
//    return view('welcome');
//});


Route::get('/admin', [\App\Http\Controllers\admin\pages\pageController::class, 'index'])->name('admin');

Route::prefix('admin')->group(function () {

    Route::resource('pages', \App\Http\Controllers\admin\pages\pageController::class);

//    Route::get('/users', function () {
        // Соответствует URL-адресу `/admin/users` ...
//    });
});










//Route::get('/admin/pages', [\App\Http\Controllers\admin\pages\pageController::class, 'index'])->name('admin-pages');
//Route::get('/admin/pages/create', [\App\Http\Controllers\admin\pages\pageController::class, 'create'])->name('create-page');

Route::get('/about', function () {
    return view('layouts.pages.about');
});







Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');

Route::get('/catalog/{slug}', [\App\Http\Controllers\CatalogController::class, 'category'])->name('catalog_category');

Route::get('/catalog/{slug}/{product_id}', [\App\Http\Controllers\CatalogController::class, 'detail'])->name('catalog_detail');



Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
