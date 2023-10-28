<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\TechnicianController;
use Laravel\Jetstream\Rules\Role;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::controller(SellController::class)->group(function () {
    Route::get('/repair', 'repairView')->name('seller.repair.view');
    Route::get('/list-repair', 'indexRepair')->name('show.repair.view')->middleware(['auth', 'verified']);
    Route::get('/detail-repair/{repair}', 'detailRepair')->name('detail.repair.view')->middleware(['auth', 'verified']);
    Route::get('/update-repair/{repair}','updateRepair')->name('repair.edit.view')->middleware(['auth', 'verified']);
});

Route::controller(TechnicianController::class)->group(function () {
    Route::get('/task/{repair}','show')->name('task.edit.view')->middleware(['auth', 'verified']);
    Route::post('/update-task/{task}','update')->name('task.update')->middleware(['auth', 'verified']);
    Route::get('/my-work','myWork')->name('repair.tech.work')->middleware(['auth', 'verified']);
});
