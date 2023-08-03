<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOrder;
use App\Models\PaymentOrder;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PaymentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Payment.DoPayment');
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
        try{
            DB::beginTransaction();

        $lastOrder = PaymentOrder::latest()->first();

        $lastIdNumber = $lastOrder ? intval(substr($lastOrder->id_order, 5)) : 0;
        $newIdNumber = $lastIdNumber + 1;

        $id = 'PD-'. str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);

        $paymentOrder = new PaymentOrder();
        $paymentOrder->id_order = $id;


        $paymentOrder->id_do = $request->input('id_do');
        $paymentOrder->harga_total = $request->input('harga_total');
        $paymentOrder->total_bayar = $request->input('total_bayar');
        $paymentOrder->bukti_bayar = $request->input('bukti_bayar');

        $paymentOrder->save();
            DB::commit();
            return redirect()->route('tableDeliveryOrder')->with('success', 'Berhasil Menambahkan PD');
        } catch (\Exception $e) {
            dd($e);
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
