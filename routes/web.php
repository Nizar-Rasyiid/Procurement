<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\APController;
use App\Http\Controllers\MarginController;
use App\Http\Controllers\APSuplierController;
use App\Http\Controllers\ARController;
use App\Http\Controllers\ARSuplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentSoController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\PaymentOrderController;
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


Route::get('/login', function(){return view("admin.Auth.login");})->name('login');
Route::post('login', [AuthController::class, "login"])->name('loginProses');
Route::get('/regis', [AuthController::class, 'Regis'])->name('Regis');
Route::post('/regis', [AuthController::class, 'Regis'])->name('regis');
Route::get('/',[AdminController::class, 'index'])->name('admin');


Auth::routes();

Route::get('/user/awaiting-approval', [UserController::class,'await'])->name('user.awaiting_approval');

Route::middleware('accept.user')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::get('/admin-table-admin',[AdminController::class, 'indexTable'])->name('tables');
    // Route::get('/admin-table-customer',[AdminController::class, 'showCustomer'])->name('tableCustomer');
    // Route::get('/admin-tableCustomer',[AdminController::class, 'showCustomer'])->name('tableCustomer');
    
    
    
    Route::get('/admin-table/storeAdmin',[AdminController::class, 'halamanStoreAdmin'])->name('store');
    Route::post('/admin-table/storeAdmin','App\Http\Controllers\AdminController@storeAdmin');
    
    // Customer
    Route::get('/admin-table/customer-table',[CustomerController::class, 'index'])->name('tableCustomer');
    Route::get('/admin-table/storeCustomer',[CustomerController::class, 'halamanStoreCustomer'])->name('storeCustomer');
    Route::post('/admin-table/storeCustomer','App\Http\Controllers\CustomerController@storeCustomer');
    Route::get('/admin-table/customers/{id}',  [CustomerController::class, 'detail'])->name('detailCust');
    
    //Suplier
    Route::get('/admin-table/suplier-table',[SuplierController::class, 'index'])->name('tableSuplier');
    Route::get('/admin-table/storeSuplier',[SuplierController::class, 'halamanStore'])->name('storeSuplier');
    Route::post('/admin-table/storeSuplier','App\Http\Controllers\SuplierController@store');
    Route::get('/admin-table/supliers/{id}',  [SuplierController::class, 'show'])->name('detailSup');
    Route::put('/admin-table/updateSuplier/{id}','App\Http\Controllers\SuplierController@update');
    Route::get('/admin-table/supliers/edit/{id}',  [SuplierController::class, 'edit'])->name('editSup');

    
    //Payment Order
    
    Route::get('/admin-table/payment-do', [PaymentOrderController::class, 'index'])->name('index');
    Route::post('/admin-table/payment-do', [PaymentOrderController::class, 'store'])->name('storePaymentDo');
    Route::post('/admin-table/update-do-status', [PaymentOrderController::class, 'updateStatus'])->name('updateStatusDo');
    Route::post('/admin-table/get-do-infoJson', [PaymentOrderController::class, 'getDoInfoJson'])->name('getDoInfoJson');
    //Transaksi
    Route::get('/admin-table/transaksi-table',[TransaksiController::class, 'index'])->name('tableTransaksi');
    Route::get('/admin-table/transaksi-table/1',[TransaksiController::class, 'detailTransaksi'])->name('detailTransaksi');
    
    
    //DO
    Route::get('/admin-table/DO-table',[DeliveryOrderController::class, 'index'])->name('tableDeliveryOrder');
    Route::get('/admin-table/store-do',[DeliveryOrderController::class, 'show'])->name('inputDeliveryDo');
    Route::post('/admin-table/store-do',[DeliveryOrderController::class, 'store'])->name('storeDo');
    Route::get('/admin-table/payment-do',[DeliveryOrderController::class, 'paymentDO'])->name('paymentOrder');
    Route::post('/admin-table/get-suplier-infoJson', [DeliveryOrderController::class, 'getSuplierInfoJson'])->name('getSuplierInfoJson');
    Route::post('/admin-table/get-so-infoJson', [DeliveryOrderController::class, 'getSoInfoJson'])->name('getSoInfoJson');
    Route::get('/admin-table/DO-table/{id}',  [DeliveryOrderController::class, 'detail'])->name('detailDo');
    Route::get('/admin-table/SO-table/download-do',  [DeliveryOrderController::class, 'downloadDeliveryOrder'])->name('downloadDeliveryOrder');

    //SO
    Route::get('/admin-table/SO-table',[SalesOrderController::class, 'index'])->name('tableSalesOrder');
    Route::get('/admin-table/store-so',[SalesOrderController::class, 'halamanInput'])->name('inputSalesOrder');
    Route::get('/admin-table/SO-table/download-so',  [SalesOrderController::class, 'downloadSalesOrder'])->name('downloadSalesOrder');
    Route::get('/admin-table/SO-table/{id}',  [SalesOrderController::class, 'show'])->name('detailSo');
    Route::post('/admin-table/store-so',[SalesOrderController::class, 'store'])->name('storeSo');
    Route::post('/admin-table/get-customer-info', [SalesOrderController::class, 'getCustomerInfo'])->name('getCustomerInfo');
    Route::post('/admin-table/get-customer-infoJson', [SalesOrderController::class, 'getCustomerInfoJson'])->name('getCustomerInfoJson');
    
    //paymentSo
    Route::get('/admin-table/payment-so',[PaymentSoController::class, 'index'])->name('paymentSo');
    Route::post('/admin-table/store-payment-so',[PaymentSoController::class, 'store'])->name('storePayment');
    Route::post('/admin-table/get-verifikasi',[PaymentSoController::class, 'getVerifikasiJson'])->name('verifikasiJson');
    Route::post('/admin-table/get-so-infoJsonPaymentSo',[PaymentSoController::class, 'getSoInfoJsonPaymentSo'])->name('getSoInfoJsonPaymentSo');



    
    Route::get('/admin-table/payment-ar-supplier',[ARSuplierController::class, 'PaymentARSupplier'])->name('PaymentARSupplier');
    Route::get('/admin-table/payment-ar-customer',[ARController::class, 'PaymentARCustomer'])->name('PaymentARCustomer');
    Route::get('/admin-table/payment-ap-supplier',[APSuplierController::class, 'PaymentAPSupplier'])->name('PaymentAPSupplier');
    Route::get('/admin-table/payment-ap-customer',[APController::class, 'PaymentAPCustomer'])->name('PaymentAPCustomer');
    
    //ap
    Route::get('/admin-table/ap-table-supplier',[APSuplierController::class, 'index'])->name('indexApSuplier');
    Route::get('/admin-table/ap-detail/{id}',[APSuplierController::class, 'show'])->name('showAp');
    Route::get('/admin-table/download-ap',[APSuplierController::class, 'downloadAp'])->name('downloadAP');
    
    //ar
    Route::get('/admin-table/ar-table-customer',[ARController::class, 'index'])->name('indexArCustomer');
    Route::get('/admin-table/ar-detail/{id}',[ARController::class, 'show'])->name('showAr');
    Route::get('/admin-table/download-ar',[ARController::class, 'downloadAr'])->name('downloadAR');

    
    //Margin
    Route::get('/admin-table/margin-detail/{id}',[TransaksiController::class, 'margin'])->name('margin');
    Route::get('/admin-table/margin-table',[MarginController::class, 'marginTable'])->name('tableMargin');
    Route::get('/admin-table/margin-table/download-margin',[TransaksiController::class, 'downloadMargin'])->name('marginDownload');
    
    
    //Accept
    Route::post('users/{user}/accept',[UserController::class,'accept'])->name('users.accept');
    Route::get('/users-table', [UserController::class,'index'])->name('userTable');

    //Varifikasi
    Route::get('/admin-table/validate-do',[DeliveryOrderController::class, 'validateDO'])->name('validateDeliveryOrder');
    Route::get('/refresh-routes', function () {
        Artisan::call('route:clear');
        return redirect()->back()->with('success', 'Routes refreshed.');
    });

    Route::get('/admin-table/verifikasi-table',[VerifikasiController::class, 'index'])->name('tableVerifikasi');
    Route::post('/admin-table/store-verifikasi',[VerifikasiController::class, 'store'])->name('verifikasiStore');
    Route::post('/admin-table/get-do-json',[VerifikasiController::class, 'getDoJson'])->name('DoJson');
    Route::get('/admin-table/verifikasi-table/{id}',  [VerifikasiController::class, 'show'])->name('showVerifikasi');
    Route::get('/admin-table/download-verifikasi',[VerifikasiController::class, 'downloadVerifikasi'])->name('verifikasiDownload');

    
    
});