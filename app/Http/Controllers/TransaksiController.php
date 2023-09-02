<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\SalesOrder;
use App\Models\DeliveryOrder;
use App\Models\Customer;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = DeliveryOrder::select('deliveryorder.*',
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
            'suplier.nama_suplier as nama_suplier'
            // 'verifikasi.gp_rp as gp_rp'
            )
        ->join('customer','deliveryorder.id_do','=','deliveryorder.id_do')
        ->join('salesorder','salesorder.id_so','=','salesorder.id_so')
        ->join('verifikasi','verifikasi.id_do','=','deliveryorder.id_do')
        ->join('suplier','deliveryorder.id_do','=','deliveryorder.id_do')
        ->get();
        return view('admin.ViewList.tableTransaksi', compact('transaksi'));
    }
    
    public function detailTransaksi()
    {
        return view('admin.Details.transaksiDetail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
