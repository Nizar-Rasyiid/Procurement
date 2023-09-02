<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APSuplier;
use Illuminate\Support\Facades\DB;

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

    public function DetailAP(){
        return view('admin.Details.APDetail');
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
