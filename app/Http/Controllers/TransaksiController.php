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
        return view('admin.ViewList.tableTransaksi');
    }


    
    public function margin(string $id)
    {
        $margin = DB::table('transaksi')
        ->join('salesorder','transaksi.id','=','salesorder.id_so')
        ->join('deliveryorder','transaksi.id','=','deliveryorder.id_do')
        ->select('transaksi.*',
            'salesorder.id_so as id_so',
            'salesorder.id_customer as id_customer',
            'salesorder.tanggal as tanggal',
            'salesorder.jumlahKg as jumlahKg',
            'salesorder.hargaPerKg as hargaPerKg',
            'salesorder.order_type as order_type',
            'salesorder.keterangan as keterangan',
            'deliveryorder.id_so as id_so',
            'deliveryorder.id_suplier as id_suplier',
            'deliveryorder.tanggal_pembelian as tanggal_pembelian',
            'deliveryorder.kandang as kandang',
            'deliveryorder.nama_supir as nama_supir',
            'deliveryorder.nomor_kendaraan as nomor_kendaraan',
            'deliveryorder.nomor_sim as nomor_sim',
            'deliveryorder.hargaPerKg as hargaPerKg',
            'deliveryorder.total_ekor as total_ekor',
            'deliveryorder.total_kg as total_kg',
            'deliveryorder.uang_jalan as uang_tangkap',
            'deliveryorder.uang_tangkap as uang_tangkap',
            'deliveryorder.solar as solar',
            'deliveryorder.etoll as etoll'
        )
        ->where('transaksi.id', $id)
        ->first();
        return view('admin.Details.margin', compact('margin'));
    }
    public function marginTable()
    {
        return view('admin.ViewList.tableMargin');
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
