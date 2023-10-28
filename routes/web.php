<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\AdminController;

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

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/porduct/{product}', [ProductController::class, 'detail'])->name('kanban');

});

Route::get('/create', function(){
    return view('Create');
})->name('create');


Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
Route::get('/register', function (){
    return view('auth.register');
})->name('register');

Route::controller(SellController::class)->group(function () {
    Route::get('/repair', 'repairView')->name('seller.repair.view');
    Route::get('/list-repair', 'indexRepair')->name('show.repair.view');
    Route::get('/detail-repair/{repair}', 'detailRepair')->name('detail.repair.view');
});
