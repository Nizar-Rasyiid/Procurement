<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\ARController;
use App\Http\Controllers\APController;
use App\Http\Controllers\APSuplierController;
use App\Http\Controllers\ARSuplierController;
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

Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/',[AdminController::class, 'index'])->name('admin');
Route::get('/admin-table-admin',[AdminController::class, 'indexTable'])->name('tables');
// Route::get('/admin-table-customer',[AdminController::class, 'showCustomer'])->name('tableCustomer');
// Route::get('/admin-tableCustomer',[AdminController::class, 'showCustomer'])->name('tableCustomer');



Route::get('/admin-table/storeAdmin',[AdminController::class, 'halamanStoreAdmin'])->name('store');
Route::post('/admin-table/storeAdmin','App\Http\Controllers\AdminController@storeAdmin');

// Customer
Route::get('/admin-table/customer-table',[CustomerController::class, 'index'])->name('tableCustomer');
Route::get('/admin-table/storeCustomer',[CustomerController::class, 'halamanStoreCustomer'])->name('storeCustomer');
Route::post('/admin-table/storeCustomer','App\Http\Controllers\CustomerController@storeCustomer');

//Suplier
Route::get('/admin-table/suplier-table',[SuplierController::class, 'index'])->name('tableSuplier');
Route::get('/admin-table/storeSuplier',[SuplierController::class, 'halamanStore'])->name('storeSuplier');
Route::post('/admin-table/storeSuplier','App\Http\Controllers\SuplierController@store');

//AR
Route::get('/admin-table/ar-table',[ARController::class, 'index'])->name('tableAR');

//AP
Route::get('/admin-table/ap-table',[APController::class, 'index'])->name('tableAP');

//ARSuplier
Route::get('/admin-table/arsuplier-table',[ARSuplierController::class, 'index'])->name('tableARSuplier');

//APSuplier
Route::get('/admin-table/apsuplier-table',[APSuplierController::class, 'index'])->name('tableAPSuplier');