<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Wine\CategoryController;
use App\Http\Controllers\WineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    ray('tu madre trabaja encolombia');
    ray(collect([1,2,3]));
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {


// RUTAS RESOURCE (index, create, update...)
Route::resource('categories',CategoryController::class)->except('show');
Route::resource('wines',WineController::class)->except('show');


// RUTAS PARA LA TIENDA BAJO UN MISMO PREFIJO 'shop'

Route::prefix('shop')->name('shop.')->group(
    function (){

        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::post('/add-to-cart', [ShopController::class, 'addToCart'])->name('addToCart');
        Route::post('/increment', [ShopController::class, 'increment'])->name('increment');
        Route::post('/decrement', [ShopController::class, 'decrement'])->name('decrement');
        Route::post('/remove', [ShopController::class, 'remove'])->name('remove');


    });
Route::prefix('cart')->name('cart.')->group(
    function (){

        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::post('/increment', [ShopController::class, 'increment'])->name('increment');
        Route::post('/decrement', [ShopController::class, 'decrement'])->name('decrement');
        Route::post('/remove', [ShopController::class, 'remove'])->name('remove');
        Route::post('/clear', [ShopController::class, 'clear'])->name('clear');


    });


});

require __DIR__.'/auth.php';
