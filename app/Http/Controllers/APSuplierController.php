<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentOrder;
use App\Models\PaymentSo;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class APSuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Ap = DB::table('payment_order')
        ->select(
            'payment_order.*',
            'deliveryorder.total_kg as total_kg',
            'deliveryorder.hargaPerKg as harga_kg',
            'deliveryorder.tanggal_pembelian as tanggal_pembelian',
            'deliveryorder.keterangan as keterangan',
            'deliveryorder.status as status_pembelian',
            DB::raw('deliveryorder.total_kg * deliveryorder.hargaPerKg as total_harga_do')
        )
        ->join('deliveryorder', 'payment_order.id_do', '=', 'deliveryorder.id_do')
        ->get();
        return view("admin.ViewList.tableAPSuplier",compact('Ap'));
    }

    public function PaymentAPSupplier(){
        return view('admin.payment.paymentAPSuplier');
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
        $ap = PaymentOrder::select('payment_order.*',
        'suplier.nama_suplier as nama_suplier',
        'suplier.id_suplier as id_suplier',
        'suplier.nomor_telepon_suplier as nomor_telepon_suplier',
        'suplier.alamat as alamat',
        'deliveryorder.tanggal_pembelian as tanggal_pembelian',
        'deliveryorder.total_kg as totalKgBeli',
        'deliveryorder.hargaPerKg as hargaPerKgBeli',
        'deliveryorder.keterangan as keteranganBeli',
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
        'verifikasi.keterangan as keterangan_verifikasi'
    )
        ->leftJoin('verifikasi', 'payment_order.id_do', '=', 'verifikasi.id_do')
        ->leftJoin('deliveryorder', 'payment_order.id_do', '=', 'deliveryorder.id_do')
        ->leftJoin('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
        ->where('payment_order.id', $id)
        ->first();
    
        return view('admin.Details.APDetail', compact('ap'));
    }
    public function downloadAp(){
        $deliveryOrderData = PaymentOrder::select('payment_order.*',
        'suplier.nama_suplier as nama_suplier',
        'suplier.id_suplier as id_suplier',
        'suplier.nomor_telepon_suplier as nomor_telepon_suplier',
        'suplier.alamat as alamat',
        'deliveryorder.tanggal_pembelian as tanggal_pembelian',
        'deliveryorder.total_kg as totalKgBeli',
        'deliveryorder.hargaPerKg as hargaPerKgBeli',
        'deliveryorder.keterangan as keteranganBeli',
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
        'verifikasi.keterangan as keterangan_verifikasi'
    )
        ->join('verifikasi', 'payment_order.id_do', '=', 'verifikasi.id_do')
        ->join('deliveryorder', 'verifikasi.id_do', '=', 'deliveryorder.id_do')
        ->join('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
        ->get();
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="ap.csv"',
        ];

        $callback = function () use ($deliveryOrderData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID Payment Pembelian',
                'Id Supplier',
                'Nama Supplier',
                'Alamat Supplier',
                'Nomor Hp Suppl',
                'Tanggal Pembelian',
                'Keterangan Pembelian',
                'Total Harga',
                'Total Bayar',
                'Hutang',
                'Saldo',
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
                    $do->id_payment_order,
                    $do->id_suplier,
                    $do->nama_suplier,
                    $do->alamat,
                    $do->nomor_telepon_suplier,
                    $do->tanggal_pembelian,
                    $do->harga_total,
                    $do->total_bayar,
                    $do->hutang,
                    $do->saldo_galus,
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
