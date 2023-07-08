<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use Illuminate\Support\Facades\DB;
class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.ViewList.tableSalesOrder');
    }
<<<<<<< HEAD

    public function tampil()
    {
        return view('admin.payment.paymentSalesOrder');
    }

=======
    public function halamanInput()  {
        return view('admin.Input.InputSO');
    }
    public function paymentSO()  {
        return view('admin.Payment.SoPayment');
    }
>>>>>>> 0d55d095acbdf81a583d6710292ff18d5c449ac8
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
