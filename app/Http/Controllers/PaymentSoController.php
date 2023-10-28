<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\PaymentSo;
use App\Models\Verifikasi;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Events\PaymentSoEvent;

class PaymentSoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $verifikasi = Verifikasi::whereIn('id_do', function($query) {
            $query->select('id_do')
                ->from('deliveryorder')
                ->whereIn('id_so', function($query) {
                    $query->select('id_so')
                        ->from('salesorder')
                        ->whereNotNull('status')
                        ->where('status', 0);
                });
        })->get();
        $salesOrder =  DB::table('salesorder')
        ->select('salesorder.*', 'deliveryorder.id_do', 'payment_so.jumlah_bayar')
        ->leftJoin('deliveryorder', 'salesorder.id_so', '=', 'deliveryorder.id_so')
        ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
        ->leftJoin('payment_so', 'salesorder.id_so', '=', 'payment_so.id_so')
        ->whereNotNull('verifikasi.id_verifikasi')
        ->where('salesorder.status', 0)
        ->where(function ($query) {
            $query->where('payment_so.jumlah_bayar', 0)
                  ->orWhereNull('payment_so.jumlah_bayar');
        })
        ->get();
            $he = SalesOrder::select('salesorder.*', 'deliveryorder.id_do')
            ->join('deliveryorder', 'salesorder.id_so', '=', 'deliveryorder.id_so')
            ->join('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
            ->where('salesorder.status', 0) // Hanya ambil yang memiliki status 0
            ->get();
        return view('admin.Payment.SoPayment', compact('verifikasi', 'salesOrder','he'));

    }
    public function getVerifikasiJson(Request $request)
    {
        $soId = $request->input('id_so');
        $verifikasiId = $request->input('id_verifikasi');
        $verifikasi = Verifikasi::select('verifikasi.*', 'customer.nama', 'deliveryorder.tanggal_pembelian')
            ->join('deliveryorder', 'verifikasi.id_do', '=', 'deliveryorder.id_do')
            ->join('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
            ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
            // ->where('salesorder.id_so', $soId)
            ->where('verifikasi.id_verifikasi', $verifikasiId)
            ->first();
            // dd($verifikasi);
    
        if ($verifikasi) {
            return response()->json($verifikasi);
        } else {
            return response()->json(['error' => 'Verifikasi not found'], 404);
        }
    }
    
    public function getSoInfoJsonPaymentSo(Request $request)
    {
        $SoId = $request->input('id_so');
    
        $So = SalesOrder::select('salesorder.*', 'customer.nama', 'customer.alamat', 'customer.nomor_telepon')
            ->leftJoin('deliveryorder', 'salesorder.id_so', '=', 'deliveryorder.id_so')
            ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
            // ->join('verifikasi','deliveryorder.id_do', '=', 'verifikasi.id_verifikasi')
            ->where('salesorder.id_so', $SoId)
            // ->whereNull('deliveryorder.id_do') // Hanya ambil yang belum memiliki DO
            ->first();
    
        if ($So) {
            return response()->json($So);
        } else {
            return response()->json(['error' => 'Sales Order not found'], 404);
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
    public function store(Request $request){
        $request->validate([
            'id_so' => 'required',
            'id_verifikasi' => 'required',
            'bukti_bayar_penjualan' => 'required',
            'keterangan' => 'required',
            'jumlah_bayar' => 'required',
            'harga_total' => 'required',
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
        $paymentSo->harga_total = $request->input('harga_total');
        if ($request->hasFile('bukti_bayar_penjualan')) {
            $request->file('bukti_bayar_penjualan')->move('buktiPembayaranSo/',$request->file('bukti_bayar_penjualan')->getClientOriginalName());
            $paymentSo->bukti_bayar_penjualan = $request->file('bukti_bayar_penjualan')->getClientOriginalName();
        } else {
            // Tangani kasus ketika tidak ada berkas yang diunggah
            dd("Error Kang");
        }
        // Simpan data so
        $paymentSo->save();
                // Update status Delivery Order
        $salesOrder = SalesOrder::where('id_so', $request->input('id_so'))->first();
        $totalPembayaran = PaymentSo::where('id_so', $request->input('id_so'))->sum('jumlah_bayar'); // Menghitung total pembayaran saat ini
        $hargaTotal = $paymentSo->harga_total;
    
            $statusBaru = $totalPembayaran >= $hargaTotal;
            $debt = max(0, $hargaTotal - $totalPembayaran);
            $paymentSo->hutang_customer = $debt;
            if ($totalPembayaran > $hargaTotal) {
                $kelebihanPembayaran = $totalPembayaran - $hargaTotal;
                // Simpan ke kolom saldo
                $saldoCustomer = $kelebihanPembayaran;
            } else {
                $kelebihanPembayaran = 0;
                $saldoCustomer = 0;
            }
            $paymentSo->saldo_customer = $saldoCustomer;
            $paymentSo->save();

            $salesOrder->status = $statusBaru;
            // dd($statusBaru,"Hutang",$paymentSo->hutang,"DEbt",$debt,"Total Pembayaran",$totalPembayaran,"Total Bayar",$paymentSo->total_bayar,"saldo",$saldoCustomer);
            $salesOrder->save();           
            if ($saldoCustomer > 0) {
                // Dapatkan id_customer dari SO terbaru
                $idCustomer = SalesOrder::where('id_so', $request->input('id_so'))->value('id_customer');
            
                // Selama masih ada saldoCustomer dan ada hutang tertua
                while ($saldoCustomer > 0) {
                    // Cari SO tertua yang belum lunas dan memiliki id_customer yang sama
                    $hutangTertua = DB::table('payment_so')
                        ->select('payment_so.*')
                        ->where('payment_so.id_so', '!=', $request->input('id_so'))
                        ->where('payment_so.hutang_customer', '>', 0)
                        ->whereIn('payment_so.id_so', function ($query) use ($idCustomer) {
                            $query->select('salesorder.id_so')
                                ->from('salesorder')
                                ->where('salesorder.id_customer', '=', $idCustomer);
                        })
                        ->orderBy('payment_so.created_at', 'DESC')
                        ->limit(1)
                        ->first();
            
                    if (!$hutangTertua) {
                        // Jika tidak ada hutang tertua, keluar dari perulangan
                        break;
                    }
            
                    // Jika ada sisa pembayaran, gunakan untuk melunasi hutang tertua
                    if ($saldoCustomer >= $hutangTertua->hutang_customer) {
                        // Lunasi hutang pelanggan untuk SO tertua
                        $selisih = $saldoCustomer - $hutangTertua->hutang_customer;
                        $hutangTertua->hutang_customer = max(0, $hutangTertua->hutang_customer - $saldoCustomer);
                    
                        // Simpan perubahan pada $hutangTertua menggunakan Query Builder
                        DB::table('payment_so')
                            ->where('id_payment_so', $hutangTertua->id_payment_so)
                            ->update(['hutang_customer' => $hutangTertua->hutang_customer]);
                    
                        // Update saldo_customer pada payment_so saat ini dengan selisih
                        DB::table('payment_so')
                            ->where('id_payment_so', $paymentSo->id_payment_so)
                            ->update(['saldo_customer' => $selisih]);
                    }
                    $idSoSebelumnya = $hutangTertua->id_so; // Ambil ID SO sebelumnya dari pembayaran hutang
                    if ($idSoSebelumnya) {
                        DB::update("UPDATE salesorder SET status = 1 WHERE id_so = ?", [$idSoSebelumnya]);
                    }
                }
            }
            

        
        
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
