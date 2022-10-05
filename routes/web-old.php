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


//1111111111

Route::get('/admin', [\App\Http\Controllers\admin\pages\pageController::class, 'index'])->name('admin');

Route::prefix('admin')->group(function () {

//    dd(123);

    Route::resource('pages', \App\Http\Controllers\admin\pages\pageController::class);

    Route::resource('components', \App\Http\Controllers\admin\components\componentsController::class);

    Route::resource('infoblock', \App\Http\Controllers\admin\infoblocks\InfoblockController::class);

    Route::resource('infoblock.values', \App\Http\Controllers\admin\infoblocks\InfoblockValuesController::class);

});

Route::get('/{slug}', [\App\Http\Controllers\PageController::class, 'index']);


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


echo __DIR__;
require __DIR__ . '/auth.php';
