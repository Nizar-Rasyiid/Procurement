<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\SalesOrder;
use App\Models\Suplier;
use Illuminate\Support\Facades\DB;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('admin.ViewList.tableDeliveryOrder');
    }

    public function halamanInput() {
        return view('admin.Input.inputDo');
    }
    public function paymentDO() {
        return view('admin.Payment.DoPayment');
    }
    public function validateDO() {
        return view('admin.Validasi.validationDo');
    }

    public function getSuplierInfoJson(Request $request) {
        $suplierId = $request->input('id_suplier');
        $suplier = Suplier::where('id_suplier', $suplierId)->first();
    
        if ($suplier) {
            return response()->json($suplier); // Return the suplier data as JSON
        } else {
            return response()->json(['error' => 'Suplier not found'], 404);
        }
    }
    
    public function getSoInfoJson(Request $request) {
        $SoId = $request->input('id_so');
        $So = SalesOrder::where('id_so', $SoId)->first();
    
        if ($So) {
            return response()->json($So); // Return the suplier data as JSON
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
