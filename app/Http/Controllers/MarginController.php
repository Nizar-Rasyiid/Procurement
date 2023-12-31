<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Margin;
use App\Models\SalesOrder;
use App\Models\DeliveryOrder;
use App\Models\Customer;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MarginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function margin(string $id)
    {
        $margin = DeliveryOrder::select('deliveryorder.*',
            'deliveryorder.hargaPerKg as hargaPerKgBeli',
            'deliveryorder.uang_jalan as uang_tangkap',
            'deliveryorder.uang_tangkap as uang_tangkap',
            'deliveryorder.solar as solar',
            'deliveryorder.etoll as etoll',
            'customer.nama as nama',
            'customer.nomor_telepon as nomor_telepon',
            'customer.alamat as alamat',
            'salesorder.tanggal as tanggal_penjualan',
            'salesorder.jumlahKg as jumlahKgJual',
            'salesorder.hargaPerKg as hargaPerKgJual',
            'verifikasi.gp_rp as gp_rp',
            'verifikasi.gp as gp',
            'verifikasi.tonase_akhir as tonase_akhir',
            'verifikasi.normal as normal',
            // 'verifikasi.gp_rp as gp_rp'
            )
        ->join('customer','deliveryorder.id_do','=','deliveryorder.id_do')
        ->join('salesorder','salesorder.id_so','=','salesorder.id_so')
        ->join('verifikasi','verifikasi.id_do','=','deliveryorder.id_do')
        ->where('deliveryorder.id', $id)
        ->first();
        return view('admin.Details.margin', compact('margin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function viewListMargin(){
        
    }
    public function marginTable()
    {
        $margin = DB::table('deliveryorder')
        ->select(
            'deliveryorder.*',
            'deliveryorder.hargaPerKg as hargaPerKgBeli',
            'deliveryorder.uang_jalan as uang_tangkap',
            'deliveryorder.solar as solar',
            'deliveryorder.etoll as etoll',
            'customer.nama as nama',
            'customer.nomor_telepon as nomor_telepon',
            'customer.alamat as alamat',
            'salesorder.tanggal as tanggal_penjualan',
            'salesorder.jumlahKg as jumlahKgJual',
            'salesorder.hargaPerKg as hargaPerKgJual',
            'suplier.nama_suplier as nama_suplier'
        )
        ->join('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
        ->join('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
        ->join('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
        ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
        ->get();    
    
        return view('admin.ViewList.tableMargin', compact('margin'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
