<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOrder;
use App\Models\SalesOrder;
use App\Models\PaymentOrder;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Events\CreateTransaksiEvent;


class PaymentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryOrder = DB::table('deliveryorder')->where('status', false)->get();
        return view('admin.Payment.DoPayment',compact('deliveryOrder'));
    }
    public function getAp() {
      $Ap =  DB::table('deliveryorder')
        ->leftJoin('payment_order', 'deliveryorder.id_do', '=', 'payment_order.id_do')
        ->select('payment_order.hutang')
        ->where('deliveryorder.status', 0)
        ->get();
        return view('admin.dashboard',compact('Ap'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request){
        $request->validate([
            'id_do' => 'required',
            'harga_total' => 'required',
            'total_bayar' => 'required',
            'bukti_bayar' => 'required',
        ]);
    
        try {
            DB::beginTransaction();
            $startingNumber = 9; // Nomor awal yang Anda inginkan
            $lastOrder = PaymentOrder::latest()->first();
            
            $lastIdNumber = $lastOrder ? intval(substr($lastOrder->id_payment_order, 7)) : $startingNumber - 1;
            $newIdNumber = max($lastIdNumber + 1, $startingNumber);
            
            $id = 'PAYORD-'. str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);
            
            $paymentOrder = new PaymentOrder();
            $paymentOrder->id_payment_order = $id;
            

            $paymentOrder->id_do = $request->input('id_do');
            $paymentOrder->harga_total = $request->input('harga_total');
            $paymentOrder->total_bayar = $request->input('total_bayar');
            $paymentOrder->bukti_bayar = $request->input('bukti_bayar');
            if ($request->hasFile('bukti_bayar')) {
                $request->file('bukti_bayar')->move('buktiPembayaranDo/',$request->file('bukti_bayar')->getClientOriginalName());
                $paymentOrder->bukti_bayar = $request->file('bukti_bayar')->getClientOriginalName();
            } else {
                // Tangani kasus ketika tidak ada berkas yang diunggah
                dd("Error Kang");
            }
            $paymentOrder->save();
            
            $deliveryOrder = DeliveryOrder::where('id_do', $request->input('id_do'))->first();
            $totalPembayaran = PaymentOrder::where('id_do', $request->input('id_do'))->sum('total_bayar');
            // Menghitung total pembayaran saat ini
            $hargaTotal = $paymentOrder->harga_total;
    
            $statusBaru = $totalPembayaran >= $hargaTotal;
            $debt = max(0, $hargaTotal - $totalPembayaran);
            $paymentOrder->hutang = $debt;
            if ($totalPembayaran > $hargaTotal) {
                $kelebihanPembayaran = $totalPembayaran - $hargaTotal;
                // Simpan ke kolom saldo
                $saldoGalus = $kelebihanPembayaran;
            } else {
                $kelebihanPembayaran = 0;
                $saldoGalus = 0;
            }
            $paymentOrder->saldo_galus = $saldoGalus;
            $paymentOrder->save();

            $deliveryOrder->status = $statusBaru;
            // dd($statusBaru,"Hutang",$paymentOrder->hutang,"DEbt",$debt,"Total Pembayaran",$totalPembayaran,"Total Bayar",$paymentOrder->total_bayar,"saldo",$saldoGalus);
            $deliveryOrder->save();           
            if ($saldoGalus > 0) {
                // Dapatkan id_customer dari SO terbaru
                $idSuplier = DeliveryOrder::where('id_do', $request->input('id_do'))->value('id_suplier');
            
                // Selama masih ada saldoGalus dan ada hutang tertua
                while ($saldoGalus > 0) {
                    // Cari SO tertua yang belum lunas dan memiliki id_suplier yang sama
                    $hutangTertua = DB::table('payment_order')
                        ->select('payment_order.*')
                        ->where('payment_order.id_do', '!=', $request->input('id_do'))
                        ->where('payment_order.hutang', '>', 0)
                        ->whereIn('payment_order.id_do', function ($query) use ($idSuplier) {
                            $query->select('deliveryorder.id_do')
                                ->from('deliveryorder')
                                ->where('deliveryorder.id_suplier', '=', $idSuplier);
                        })
                        ->orderBy('payment_order.created_at', 'DESC')
                        ->limit(1)
                        ->first();
            
                    if (!$hutangTertua) {
                        // Jika tidak ada hutang tertua, keluar dari perulangan
                        break;
                    }
            
                    // Jika ada sisa pembayaran, gunakan untuk melunasi hutang tertua
                    if ($saldoGalus >= $hutangTertua->hutang) {
                        // Lunasi hutang pelanggan untuk SO tertua
                        $selisih = $saldoGalus - $hutangTertua->hutang;
                        $hutangTertua->hutang = max(0, $hutangTertua->hutang - $saldoGalus);
                    
                        // Simpan perubahan pada $hutangTertua menggunakan Query Builder
                        DB::table('payment_order')
                            ->where('id_payment_order', $hutangTertua->id_payment_order)
                            ->update(['hutang' => $hutangTertua->hutang]);
                    
                        // Update saldo_galus pada payment_order saat ini dengan selisih
                        DB::table('payment_order')
                            ->where('id_payment_order', $paymentOrder->id_payment_order)
                            ->update(['saldo_galus' => $selisih]);
                    }
                    //  else {
                    //     // Bagian sisa pembayaran digunakan untuk melunasi SO tertua
                    //     $hutangTertua->hutang -= $saldoGalus;
                    //     $saldoGalus = max(0, $saldoGalus - $hutangTertua->hutang);
            
                    //     // Simpan perubahan pada $hutangTertua menggunakan Query Builder
                    //     DB::table('payment_order')
                    //         ->where('id_payment_order', $hutangTertua->id_payment_order)
                    //         ->update(['hutang' => $hutangTertua->hutang]);
            
                    //     // Update saldo_galus pada payment_order saat ini dengan sisa pembayaran
                    //     DB::table('payment_order')
                    //         ->where('id_payment_order', $paymentOrder->id_payment_order)
                    //         ->update(['saldo_galus' => $saldoGalus]);
                    // }
            
                    $idDoSebelumnya = $hutangTertua->id_do; // Ambil ID SO sebelumnya dari pembayaran hutang
                    if ($idDoSebelumnya) {
                        DB::update("UPDATE deliveryorder SET status = 1 WHERE id_do = ?", [$idDoSebelumnya]);
                    }
                }
            }
            
        DB::commit();
        return redirect()->route('tableDeliveryOrder')->with('success', 'Berhasil Menambahkan PD');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Payment: ' . $e->getMessage());
        }
    }
    

    

    public function getDoInfoJson(Request $request){
        $DoId = $request->input('id_do');
        $Do = DeliveryOrder::where('id_do', $DoId)->first();
    
        if ($Do) {
            return response()->json($Do); // Return the customer data as JSON
        } else {
            return response()->json(['error' => 'Delivery Order not found'], 404);
        }
    }

    // app/Http/Controllers/DoController.php

    public function updateStatus(Request $request)
    {
        $idDo = $request->input('id_do');
        $newStatus = $request->input('new_status');

        $do = DeliveryOrder::find($idDo);
        if ($do) {
            $do->status = $newStatus;
            $do->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */


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
