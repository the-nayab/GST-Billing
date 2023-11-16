<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\VendorInvoice;
use App\Http\Controllers\AppController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

# Index Page
Route::get('/', [AppController::class, 'index'])->name('dashboard');

// Party routes
Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
Route::get('/manage-parties', [PartyController::class, 'index'])->name('manage-parties');
Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
Route::put('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');
Route::delete('/delete-party/{party}', [PartyController::class, 'deleteParty'])->name('delete-party');

// GST bill routes
Route::get('/add-gst-bill', [GstBillController::class, 'addGstBill'])->name('add-gst-bill');
Route::get('/manage-gst-bills', [GstBillController::class, 'index'])->name('manage-gst-bills');
Route::get('/print-gst-bill/{id}', [GstBillController::class, 'print'])->name('print-gst-bill');
Route::post('/create-gst-bill', [GstBillController::class, 'createGstBill'])->name('create-gst-bill');

// Soft Delete route
Route::get('/delete/{table}/{id}', [AppController::class, 'delete'])->name('delete');

// Resource Controller routes
Route::resource('vendor-invoice', VendorInvoice::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
