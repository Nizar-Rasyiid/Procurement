<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\SalesOrderController;
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


//Transaksi
Route::get('/admin-table/transaksi-table',[TransaksiController::class, 'index'])->name('tableTransaksi');


//DO
Route::get('/admin-table/DO-table',[DeliveryOrderController::class, 'index'])->name('tableDeliveryOrder');
Route::get('/admin-table/store-do',[DeliveryOrderController::class, 'halamanInput'])->name('paymentDo');
Route::get('/admin-table/payment-do',[DeliveryOrderController::class, 'paymentDO'])->name('inputDeliveryOrder');
Route::get('/admin-table/validate-do',[DeliveryOrderController::class, 'validateDO'])->name('validateDeliveryOrder');
//SO
Route::get('/admin-table/SO-table',[SalesOrderController::class, 'index'])->name('tableSalesOrder');
Route::get('/admin-table/store-so',[SalesOrderController::class, 'halamanInput'])->name('inputSalesOrder');
Route::get('/admin-table/payment-so',[SalesOrderController::class, 'paymentSO'])->name('paymentSo');
