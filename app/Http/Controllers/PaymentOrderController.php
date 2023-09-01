<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOrder;
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
    public function store(Request $request)
    {
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
            
            // Update status Delivery Order
            $deliveryOrder = DeliveryOrder::where('id_do', $request->input('id_do'))->first();
            $totalPembayaran = PaymentOrder::where('id_do', $request->input('id_do'))->sum('total_bayar'); // Menghitung total pembayaran saat ini
            $hargaTotal = $paymentOrder->harga_total;
            
            // Cek apakah total pembayaran sudah mencukupi harga total
            $statusBaru = $totalPembayaran >= $hargaTotal;
            
            $paymentOrder->hutang = $hargaTotal - $totalPembayaran;
            $paymentOrder->save();
            
            $deliveryOrder->status = $statusBaru;
            $deliveryOrder->save();
            DB::commit();
            return redirect()->route('tableDeliveryOrder')->with('success', 'Berhasil Menambahkan PD');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Customer: ' . $e->getMessage());
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
