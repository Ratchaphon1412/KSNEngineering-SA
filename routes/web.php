<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Livewire\UpdateProduct;
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
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/service', function () {
    return view('service');
})->name('service');



Route::get('/contact', function () {
    return view('contact');
})->name('contact');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});

Route::get('/create-product', function () {
    return view('product.create-product');
})->name('create');

Route::get('/kanban', function () {
    return view('kanban');
})->name('kanban');

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'dashboard')->name('admin');
    Route::post('/admin/deleteProduct/{product}', 'deleteProduct')->name('deleteProduct');
    Route::get('/show_team','showTeam')->name('team.show');
    Route::post('/addteam/{user}','editTeam')->name('user.team.edit');
    Route::post('/creat_team',"createTeam")->name('create.team');
});

Route::get('/admin/updateProduct/{product}', UpdateProduct::class)->name('product.update');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/payment/charge', function () {
    return view('seller.payment-confirm', [
        'status' => 'success'
    ]);
})->name('confirm');

Route::get('/payment/qr', function () {
    return view('seller.payment-qr');
})->name('qr');

Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment/link/{amount}/{repair}', 'link')->name('payment.link');
    Route::post('/payment/charge', 'charge')->name('payment.charge');
    Route::post('/payment/charge/qr/confirm', 'ChargePaid')->name('payment.charge.qr');
    Route::post('/payment/charge/qr/failed', 'chargeFailed')->name('payment.charge.qr.view');
});

Route::controller(SellController::class)->group(function () {
    Route::get('/repair', 'repairView')->name('seller.repair.view');
    Route::get('/list-repair', 'indexRepair')->name('show.repair.view')->middleware(['auth', 'verified']);
    Route::get('/detail-repair/{repair}', 'detailRepair')->name('detail.repair.view')->middleware(['auth', 'verified']);
    Route::get('/update-repair/{repair}', 'updateRepairShow')->name('repair.edit.view')->middleware(['auth', 'verified']);
    Route::get('/payment-repair/{repair}', 'paymentRepairShow')->name('repair.payment.view')->middleware(['auth', 'verified']);
    Route::post('/updated-repair/{repair}', 'updateRepair')->name('repair.edit.update')->middleware(['auth', 'verified']);
    Route::post('/add-purchase-order/{repair}', 'purchaseOrder')->name('purchase.add')->middleware(['auth', 'verified']);
    Route::post("/add-amount/{repair}", 'addAmount')->name('add.amount')->middleware(['auth', 'verified']);
    Route::get("/inprocess-repair", 'inProcessRepair')->name('seller.InProcess.view')->middleware(['auth', 'verified']);
    Route::get("/createCompany", 'showCreateCompany')->name('show.company.view')->middleware(['auth', 'verified']);
    Route::post("/registerCompany", 'registerCompany')->name('register.company')->middleware(['auth', 'verified']);
});

Route::controller(TechnicianController::class)->group(function () {
    Route::get('/task/{repair}', 'show')->name('task.edit.view')->middleware(['auth', 'verified']);
    Route::post('/update-task/{task}', 'update')->name('task.update')->middleware(['auth', 'verified']);
    Route::get('/my-work', 'myWork')->name('repair.tech.work')->middleware(['auth', 'verified']);
    Route::post('/done-repair/{repair}', 'doneRepair')->name('done.repair')->middleware(['auth', 'verified']);
    Route::post('/delete-repair/{repair}', 'deleteRepair')->name('delete.repair')->middleware(['auth', 'verified']);
    Route::get("/myWork/{user}", 'myWorkTech')->name('repair.mywork')->middleware(['auth', 'verified']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'view')->name('product.index');
    Route::get('/product/{product}', 'detail')->name('kanban');
    Route::get('/product/create/crane', 'createCrane')->name('product.crane.create');
    Route::get('/product/create/product', 'createProduct')->name('product.product.create');
    Route::get('/product/create/quotation/{repair}', 'createQuotation')->name('product.quotation.create');
});


