<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/product', [productController::class, 'view'])->name('product.index');
Route::post('/product', [productController::class, 'upload'])->name('product.upload');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/about', function (){
        return view('about');
    })->name('about');
    
    Route::get('/service', function (){
        return view('service');
    })->name('service');

    Route::get('/crane', function(){
        return view('crane');
    })->name('crane');

    Route::get('/reward', function(){
        return view('reward');
    })->name('reward');

    Route::get('/contact', function(){
        return view('contact');
    })->name('contact');

});


Route::get('/admin', function () {
    return view('admin.dashboard');
});
