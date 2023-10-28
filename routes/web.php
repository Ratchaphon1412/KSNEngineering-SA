<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/service', function () {
        return view('service');
    })->name('service');

    Route::get('/crane', function () {
        return view('crane');
    })->name('crane');

    Route::get('/reward', function () {
        return view('reward');
    })->name('reward');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    
});

Route::get('/create', function(){
    return view('Create');
})->name('create');

Route::get('/kanban', function () {
    return view('kanban');
})->name('kanban');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
Route::get('/register', function (){
    return view('auth.register');
})->name('register');

Route::controller(SellController::class)->group(function () {
    Route::get('/repair', 'repairView')->name('seller.repair.view');
    Route::get('/list-repair', 'indexRepair')->name('show.repair.view');
    Route::get('/detail-repair/{repair}', 'detailRepair')->name('detail.repair.view');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'view')->name('product.index');
    Route::get('/porduct/{product}', 'detail')->name('kanban');
    Route::get('/product/create/crane', 'createCrane')->name('product.crane.create');
    Route::get('/product/create/product', 'createProduct')->name('product.product.create');
});
