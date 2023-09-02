<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function accept(User $user)
    {
        $user->accept();
        return redirect()->back()->with('success', 'Pengguna telah diterima.');
    }
    public function await()  {
        return view('await');
    }
    public function index()
    {
        $user = User::all();
        return view('admin.Acceptance.AcceptUser',compact('user'));
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
    public function downloadMargin(){
        try {
            $deliveryOrderData = DB::table('deliveryorder')
            ->select(
                'deliveryorder.*',
                'deliveryorder.hargaPerKg as hargaPerKgBeli',
                'deliveryorder.uang_jalan as uang_jalan', // Seharusnya uang_jalan
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
            )
            ->join('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
            ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do') // Menggunakan leftJoin
            ->join('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
            ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
            ->whereNull('verifikasi.id_do') // Hanya ambil yang belum memiliki DO
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

            foreach ($deliveryOrderData as $do) {
                $harga_total_beli = $do->total_kg * $do->hargaPerKgBeli;
                $gp_total = $do->gp * $do->gp_rp;
                $margin_kg = $do->hargaPerKgJual - $do->hargaPerKgBeli;
                $normal = $do->hargaPerKgJual * $do->tonase_akhir;
                $penjualan_akhir = $gp_total + $normal;
                $margin_harian = $penjualan_akhir - $harga_total_beli;
                $total_operational = $do->uang_jalan + $do->uang_tangkap + $do->solar + $do->etoll;
                $laba = $margin_harian - $total_operational;

                fputcsv($file, [
                    $do->id_so,
                    $do->id_so,
                    $do->nama,
                    $do->id_do,
                    $do->nama_suplier,
                    $do->tanggal_penjualan,
                    $do->tanggal_pembelian,
                    $do->harga_penjualan,
                    $do->harga_pembelian,
                    $margin_harian,
                    $do->keterangan,
                    $do->hargaPerKgBeli,
                    $do->gp_rp,
                    $do->hargaPerKgJual,
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
                ]);
            }
            
            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
         } catch (PDOException $e) {
        return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
   
    }
}
