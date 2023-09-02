<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\PaymentSo;
use App\Models\Verifikasi;
use App\Models\Transaksi;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
class PaymentSoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Payment.SoPayment');
    }

    public function getVerifikasiJson(Request $request) {
        $verifikasiId = $request->input('id_verifikasi');

        $verifikasi = Verifikasi::select('verifikasi.*','deliveryorder.tanggal_pembelian')
                                ->join('deliveryorder','verifikasi.id_do' ,'=','deliveryorder.id_do')
                                ->where('verifikasi.id_verifikasi',$verifikasiId)
                                ->first();
        if ($verifikasi) {
            return response()->json($verifikasi); // Return the suplier data as JSON
        } else {
            return response()->json(['error' => 'Verifikasi not found'], 404);
        }
    }

    public function getSoJson(Request $request) {
        $SoId = $request->input('id_so');

        $So = SalesOrder::select('salesorder.*', 'customer.nama', 'customer.alamat', 'customer.nomor_telepon')
            ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
            ->where('salesorder.id_so', $SoId)
            ->first();

        if ($So) {
            return response()->json($So);
        } else {
            return response()->json(['error' => 'Sales Order not found'], 404);
        }
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
        $request->validate([
            'id_so' => 'required',
            'id_verifikasi' => 'required',
            'jumlah_bayar' => 'required',
            'bukti_bayar_penjualan' => 'required',
            'keterangan' => 'required',
        ]);
        try {
            DB::beginTransaction();
        
           // Mengambil ID terakhir dari database
        $lastPaymentSo = PaymentSo::latest()->first();

        // Mendapatkan angka dari ID terakhir dan menambahkannya dengan 1
        $lastIdNumber = $lastPaymentSo ? intval(substr($lastPaymentSo->id_so, 5)) : 0;
        $newIdNumber = $lastIdNumber + 1;

        // Menghasilkan ID dengan format "SO-xxxxxx"
        $id = 'PAYSO-' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);

        // Simpan data baru dengan ID yang sudah di-generate
        $paymentSo = new PaymentSo();
        $paymentSo->id_payment_so = $id;


        // Lanjutkan menyimpan data lainnya sesuai dengan kebutuhan
        $paymentSo->id_so = $request->input('id_so');
        $paymentSo->id_verifikasi = $request->input('id_verifikasi');
        $paymentSo->jumlah_bayar = $request->input('jumlah_bayar');
        $paymentSo->bukti_bayar_penjualan = $request->input('bukti_bayar_penjualan');
        $paymentSo->keterangan = $request->input('keterangan');

        // Simpan data so
        $paymentSo->save();
            DB::commit();
            return redirect()->route('tableSalesOrder')->with('success', 'Berhasil Menambahkan So');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Customer: ' . $e->getMessage());
        }
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
