<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AR;
use App\Models\PaymentOrder;
use App\Models\PaymentSo;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ARController extends Controller   
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar = DB::table('payment_so')
        ->select(
            'payment_so.*',
            'salesorder.jumlahKg as jumlah_kg',
            'salesorder.hargaPerKg as harga_kg',
            'salesorder.tanggal as tanggal_penjualan',
            'salesorder.keterangan as keterangan',
            'salesorder.status as status_penjualan',
            'verifikasi.id_verifikasi as id_verifikasi',
            'verifikasi.tanggal_verifikasi as tanggal_verifikasi',
            'verifikasi.gp as gp',
            'verifikasi.gp_rp as gp_rp',
            'verifikasi.tonase_akhir as tonase_akhir',
            DB::raw('salesorder.jumlahKg * salesorder.hargaPerKg as total_harga_so'),
            DB::raw('(verifikasi.gp * verifikasi.gp_rp) + (verifikasi.tonase_akhir * salesorder.hargaPerKg) as harga_verifikasi'),
        )
        ->join('salesorder', 'payment_so.id_so', '=', 'salesorder.id_so')
        ->join('verifikasi', 'payment_so.id_verifikasi', '=', 'verifikasi.id_verifikasi')
        ->get();
    
        return view('admin.ViewList.tableAR', compact('ar'));
    
    }

    public function PaymentARCustomer(){
        return view('admin.payment.paymentARCustomer');
    }

    public function DetailAR(){
        return view('admin.Details.ARDetail');
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
        $ar = PaymentSo::select('payment_so.*',
        'deliveryorder.id_do as id_do',
        'customer.nama as nama',
        'customer.id_customer as id_customer',
        'customer.nomor_telepon as nomor_telepon',
        'customer.alamat as alamat',
        'salesorder.tanggal as tanggal_penjualan',
        'salesorder.jumlahKg as jumlahKgJual',
        'salesorder.hargaPerKg as hargaPerKgJual',
        'salesorder.keterangan as keteranganJual',
        'verifikasi.gp_rp as gp_rp',
        'verifikasi.gp as gp',
        'verifikasi.tanggal_verifikasi as tanggal_verifikasi',
        'verifikasi.tonase_akhir as tonase_akhir',
        'verifikasi.normal as normal',
        'verifikasi.mati_susulan as mati_susulan',
        'verifikasi.kg_susut as kg_susut',
        'verifikasi.susut as susut',
        'verifikasi.gp_normal as gp_normal',
        'verifikasi.ekor as ekor',
        'verifikasi.keterangan as keterangan_verifikasi',
        // 'verifikasi.gp_rp as gp_rp'
        DB::raw('(verifikasi.gp * verifikasi.gp_rp) + (verifikasi.tonase_akhir * salesorder.hargaPerKg) as harga_verifikasi'),
        )   
        ->join('verifikasi','payment_so.id_verifikasi','=','verifikasi.id_verifikasi')
        ->join('deliveryorder','verifikasi.id_do','=','deliveryorder.id_do')
        ->join('salesorder','payment_so.id_so','=','salesorder.id_so')
        ->join('customer','salesorder.id_customer','=','customer.id_customer')
        ->where('payment_so.id', $id)
        ->first();
        return view('admin.Details.ARDetail', compact('ar'));
    }
    public function downloadAr(){
        $deliveryOrderData = PaymentSo::select('payment_so.*',
        'deliveryorder.id_do as id_do',
        'customer.nama as nama',
        'customer.id_customer as id_customer',
        'customer.nomor_telepon as nomor_telepon',
        'customer.alamat as alamat',
        'salesorder.tanggal as tanggal_penjualan',
        'salesorder.jumlahKg as jumlahKgJual',
        'salesorder.hargaPerKg as hargaPerKgJual',
        'salesorder.keterangan as keteranganJual',
        'verifikasi.gp_rp as gp_rp',
        'verifikasi.gp as gp',
        'verifikasi.tanggal_verifikasi as tanggal_verifikasi',
        'verifikasi.tonase_akhir as tonase_akhir',
        'verifikasi.normal as normal',
        'verifikasi.mati_susulan as mati_susulan',
        'verifikasi.kg_susut as kg_susut',
        'verifikasi.susut as susut',
        'verifikasi.gp_normal as gp_normal',
        'verifikasi.ekor as ekor',
        'verifikasi.keterangan as keterangan_verifikasi',
        // 'verifikasi.gp_rp as gp_rp'
        DB::raw('(verifikasi.gp * verifikasi.gp_rp) + (verifikasi.tonase_akhir * salesorder.hargaPerKg) as harga_verifikasi'),
        )   
        ->join('verifikasi','payment_so.id_verifikasi','=','verifikasi.id_verifikasi')
        ->join('deliveryorder','verifikasi.id_do','=','deliveryorder.id_do')
        ->join('salesorder','payment_so.id_so','=','salesorder.id_so')
        ->join('customer','salesorder.id_customer','=','customer.id_customer')
        ->get();
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="ar.csv"',
        ];

        $callback = function () use ($deliveryOrderData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID Payment Penjualan',
                'Id Customer',
                'Nama Customer',
                'Alamat Customer',
                'Nomor Hp',
                'Tanggal Penjualan',
                'Keterangan Penjualan',
                'Total Harga',
                'Total Bayar',
                'Piutang',
                'Saldo',
                'Keterangan Payment Penjualan',
                'ID Verifikasi',
                'Tanggal Verifikasi',
                'GP',
                'GP RP',
                'Ekor Verifikasi',
                'KG Susut',
                'Susut',
                'KG Verifikasi',
                'Normal',
                'Mati Susulan',
                'Tonase Akhir',
            ]);

            foreach ($deliveryOrderData as $do) {
                $status = $do->status == 0 ? 'Belum Lunas' : 'Lunas';
                $buktiBayar = asset('buktiPembayaranDo/'.$do->bukti_bayar); 
                fputcsv($file, [
                    $do->id_payment_so,
                    $do->id_customer,
                    $do->nama_customer,
                    $do->alamat,
                    $do->nomor_telepon,
                    $do->tanggal_penjualan,
                    $do->harga_total,
                    $do->jumlah_bayar,
                    $do->hutang_customer,
                    $do->saldo_customer,
                    $do->keterangan,
                    $do->id_verifikasi,
                    $do->tanggal_verifikasi,
                    $do->gp,
                    $do->gp_rp,
                    $do->ekor,
                    $do->kg_susut,
                    $do->susut,
                    $do->kg,
                    $do->normal,
                    $do->mati_susulan,
                    $do->tonase_akhir,
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
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
