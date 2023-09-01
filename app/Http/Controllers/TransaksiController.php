<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Margin;
use App\Models\SalesOrder;
use App\Models\DeliveryOrder;
use App\Models\Customer;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Exception;
use PDOException;

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
        return view('admin.ViewList.tableTransaksi',compact('transaksi'));
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
            'verifikasi.gp_rp as gp_rp',
            'verifikasi.gp as gp',
            'verifikasi.tonase_akhir as tonase_akhir',
            'verifikasi.normal as normal',
            'suplier.nama_suplier as nama_suplier'
        )
        ->join('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
        ->join('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
        ->join('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
        ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
        ->get();  
        return view('admin.ViewList.tableMargin', compact('margin'));
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
            )
        ->join('customer','deliveryorder.id_do','=','deliveryorder.id_do')
        ->join('salesorder','deliveryorder.id_so','=','salesorder.id_so')
        ->join('verifikasi','verifikasi.id_do','=','deliveryorder.id_do')
        ->where('deliveryorder.id', $id)
        ->first();
        return view('admin.Details.margin', compact('margin'));
    }

    public function downloadMargin(){
        try {
            $deliveryOrderData = DB::table('deliveryorder')
                ->select(
                    'deliveryorder.id_so',
                    'deliveryorder.id_do',
                    'deliveryorder.tanggal_pembelian as tanggal_pembelian',
                    'deliveryorder.hargaPerKg as harga_pembelian',
                    'deliveryorder.total_kg as total_kg',
                    'deliveryorder.etoll as etoll',
                    'deliveryorder.uang_jalan as uang_jalan', // Seharusnya uang_jalan
                    'deliveryorder.uang_tangkap as uang_tangkap',
                    'deliveryorder.solar as solar',
                    'deliveryorder.keterangan as keterangan',
                    'customer.id_customer',
                    'customer.nama as nama_customer',
                    'customer.nomor_telepon as nomor_telepon',
                    'customer.alamat as alamat',
                    'suplier.nama_suplier as nama_suplier',
                    'salesorder.tanggal as tanggal_penjualan',
                    'salesorder.hargaPerKg as harga_penjualan',
                    'salesorder.jumlahKg as jumlah_pembelian',
                    'verifikasi.id_verifikasi',
                    'verifikasi.gp_rp as gp_rp',
                    'verifikasi.gp as gp',
                    'verifikasi.tonase_akhir as tonase_akhir',
                    'verifikasi.normal as normal',
                    // ... (other columns you need)
                )
                ->leftJoin('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
                ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
                ->leftJoin('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
                ->leftJoin('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
                ->whereNotNull('verifikasi.id_do')
                ->get();

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="margin.csv"',
            ];

            $callback = function () use ($deliveryOrderData) {
                $file = fopen('php://output', 'w');
                fputcsv($file, [
                    'ID Transaksi',
                    'ID Penjualan',
                    'Nama Customer',
                    'ID Pembelian',
                    'Nama Suplier',
                    'Tanggal Penjualan',
                    'Tanggal Pembelian',
                    'Harga Penjualan',
                    'Harga Pembelian',
                    'Margin Harian',
                    'Keterangan',
                    'Harga Beli',
                    'GP(Rp)',
                    'Harga Jual',
                    'Margin/Kg',
                    'Harga Total Pembelian',
                    'Gp Total',
                    'Normal',
                    'Penjualan Akhir',
                    'Margin Harian',
                    'Uang Jalan',
                    'Uang Tangkap',
                    'Solar',
                    'E-Toll',
                    'Total Operasional',
                    'Laba',
                ]);
                $increment= 1;
                foreach ($deliveryOrderData as $do) {
                    $transaksi_id = "TRANS-" . str_pad($increment, 5, '0', STR_PAD_LEFT);
                    $harga_total_beli = $do->total_kg * $do->harga_pembelian;
                    $gp_total = $do->gp * $do->gp_rp;
                    $margin_kg = $do->harga_penjualan - $do->harga_pembelian;
                    $normal = $do->harga_penjualan * $do->tonase_akhir;
                    $penjualan_akhir = $gp_total + $normal;
                    $margin_harian = $penjualan_akhir - $harga_total_beli;
                    $total_operational = $do->uang_jalan + $do->uang_tangkap + $do->solar + $do->etoll;
                    $laba = $margin_harian - $total_operational;
                    fputcsv($file, [
                       $transaksi_id,
                        $do->id_so,
                        $do->nama_customer,
                        $do->id_do,
                        $do->nama_suplier,
                        $do->tanggal_penjualan,
                        $do->tanggal_pembelian,
                        $do->harga_penjualan,
                        $do->harga_pembelian,
                        $margin_harian,
                        $do->keterangan,
                        $do->harga_pembelian,
                        $do->gp_rp,
                        $do->harga_penjualan,
                        $margin_kg,
                        $harga_total_beli,
                        $gp_total,
                        $normal,
                        $penjualan_akhir,
                        $margin_harian,
                        $do->uang_jalan,
                        $do->uang_tangkap,
                        $do->solar,
                        $do->etoll,
                        $total_operational,
                        $laba,

                        // ... (add other data you need)
                    ]);
                    $increment++;
                }

                fclose($file);
            };

            return new StreamedResponse($callback, 200, $headers);
        } catch (\PDOException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    
}
