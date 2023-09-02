<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\SalesOrder;
use App\Models\Customer;
use App\Models\Suplier;
use Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $do = DeliveryOrder::get();
    
        return view('admin.ViewList.tableDeliveryOrder', compact('do'));
    }

    public function halamanInput(Request $request) {
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id', $customerId)->first();

        return view('admin.Input.InputDo');
    }
    public function paymentDO() {
        $deliveryOrder = DeliveryOrder::all();
        return view('admin.Payment.DoPayment',compact('deliveryOrder'));
    }
    public function validateDO()
    {
        $deliveryOrder = DeliveryOrder::select('deliveryorder.*')
            ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
            ->whereNull('verifikasi.id_verifikasi') // Hanya ambil yang belum memiliki DO
            ->where('deliveryorder.status', 1) // Hanya ambil yang memiliki status 1
            ->get();
        return view('admin.Validasi.validationDo', compact('deliveryOrder'));
    }
    

    public function getCustomerInfoJson(Request $request)
    {
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id_customer', $customerId)->first();
    
        if ($customer) {
            return response()->json($customer); // Return the customer data as JSON
        } else {
            return response()->json(['error' => 'Customer not found'], 404);
        }
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
    public function detail(string $id)  {
        $deliveryOrder = DB::table('deliveryorder')
        ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do' )
        ->leftJoin('payment_order', 'deliveryorder.id_do', '=', 'payment_order.id_do' )
        ->leftJoin('salesorder','deliveryorder.id_so', '=', 'salesorder.id_so' )
        ->leftJoin('suplier','deliveryorder.id_suplier', '=', 'suplier.id_suplier' )
        ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer' )
        ->select(
            'deliveryorder.*', 
            'customer.nama as nama',
            'customer.id_customer as id_customer',
            'suplier.id_suplier as id_suplier',
            'suplier.nama_suplier as nama_suplier',
            'verifikasi.id_verifikasi as id_verifikasi',
            'verifikasi.tanggal_verifikasi',
            'verifikasi.gp',
            'verifikasi.gp_rp',
            'verifikasi.ekor',
            'verifikasi.kg_susut',
            'verifikasi.susut',
            'verifikasi.kg',
            'verifikasi.normal',
            'verifikasi.mati_susulan',
            'verifikasi.tonase_akhir',
            'verifikasi.total_kg_tiba',
            'payment_order.id_payment_order',
            'payment_order.harga_total',
            'payment_order.total_bayar',
            'payment_order.bukti_bayar'
        )
        ->where('deliveryorder.id', $id)
        ->first();
            
    return view('admin.Details.doDetail', compact('deliveryOrder'));

    }
    public function show(Request $request){
        $salesOrder = SalesOrder::select('salesorder.*')
        ->leftJoin('deliveryorder', 'salesorder.id_so', '=', 'deliveryorder.id_so')
        ->whereNull('deliveryorder.id_do') // Hanya ambil yang belum memiliki DO
        ->get();
        $supliers = Suplier::all();
        // return $deliveryOrder;
        return view('admin.Input.inputDo',compact('salesOrder','supliers'));
    }
    public function getSoInfoJson(Request $request)
    {
        $SoId = $request->input('id_so');
    
        $So = SalesOrder::select('salesorder.*', 'customer.nama', 'customer.alamat', 'customer.nomor_telepon')
            ->leftJoin('deliveryorder', 'salesorder.id_so', '=', 'deliveryorder.id_so')
            ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
            ->where('salesorder.id_so', $SoId)
            ->whereNull('deliveryorder.id_do') // Hanya ambil yang belum memiliki DO
            ->first();
    
        if ($So) {
            return response()->json($So);
        } else {
            return response()->json(['error' => 'Sales Order not found'], 404);
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_so' => 'required',
            'id_suplier' => 'required',
            'tanggal_pembelian' => 'required',
            'kandang' => 'required',
            'nama_supir' => 'required',
            'nomor_kendaraan' => 'required',
            'nomor_sim' => 'required',
            'hargaPerKg' => 'required',
            'total_ekor' => 'required',
            'total_kg' => 'required',
            'keterangan' => 'required',
            'uang_jalan' => 'required',
            'uang_tangkap' => 'required',
            'solar' => 'required',
            'etoll' => 'required',
            'order_type' => 'required',
        ]);
        try{
            DB::beginTransaction();

        $lastDO = DeliveryOrder::latest()->first();

        $lastIdNumber = $lastDO ? intval(substr($lastDO->id_do, 5)) : 0;
        $newIdNumber = $lastIdNumber + 1;

        $id = 'DO-'. str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);

        $deliveryOrder = new DeliveryOrder();
        $deliveryOrder->id_do = $id;

        $deliveryOrder->id_so = $request->input('id_so');
        $deliveryOrder->id_suplier = $request->input('id_suplier');
        $deliveryOrder->tanggal_pembelian = $request->input('tanggal_pembelian');
        $deliveryOrder->kandang = $request->input('kandang');
        $deliveryOrder->nama_supir = $request->input('nama_supir');
        $deliveryOrder->nomor_kendaraan = $request->input('nomor_kendaraan');
        $deliveryOrder->nomor_sim = $request->input('nomor_sim');
        $deliveryOrder->hargaPerKg = $request->input('hargaPerKg');
        $deliveryOrder->total_ekor = $request->input('total_ekor');
        $deliveryOrder->total_kg = $request->input('total_kg');
        $deliveryOrder->keterangan = $request->input('keterangan');
        $deliveryOrder->uang_jalan = $request->input('uang_jalan');
        $deliveryOrder->uang_tangkap = $request->input('uang_tangkap');
        $deliveryOrder->solar = $request->input('solar');
        $deliveryOrder->etoll = $request->input('etoll');
        $deliveryOrder->order_type = $request->input('order_type');

        $deliveryOrder->save();
            DB::commit();
            return redirect()->route('tableDeliveryOrder')->with('success', 'Berhasil Menambahkan DO');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Customer: ' . $e->getMessage());
        }
    } 


    public function downloadDeliveryOrder(){
        $deliveryOrderData = DB::table('deliveryorder')
            ->select(
                'deliveryorder.*',
                'customer.nama as nama_customer',
                'customer.id_customer as id_customer',
                'suplier.id_suplier as id_suplier',
                'suplier.nama_suplier as nama_suplier',
                'verifikasi.id_verifikasi as id_verifikasi',
                'verifikasi.tanggal_verifikasi',
                'verifikasi.gp',
                'verifikasi.gp_rp',
                'verifikasi.ekor',
                'verifikasi.kg_susut',
                'verifikasi.susut',
                'verifikasi.kg',
                'verifikasi.normal',
                'verifikasi.mati_susulan',
                'verifikasi.tonase_akhir',
                'verifikasi.total_kg_tiba',
                'payment_order.id_payment_order',
                'payment_order.harga_total',
                'payment_order.total_bayar',
                'payment_order.bukti_bayar'
            )
            ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
            ->leftJoin('payment_order', 'deliveryorder.id_do', '=', 'payment_order.id_do')
            ->leftJoin('salesorder', 'deliveryorder.id_so', '=', 'salesorder.id_so')
            ->leftJoin('suplier', 'deliveryorder.id_suplier', '=', 'suplier.id_suplier')
            ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
            ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_deliveryorder.csv"',
        ];

        $callback = function () use ($deliveryOrderData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID Penjualan',
                'Id Customer',
                'Nama Customer',
                'Id Suplier',
                'Nama Suplier',
                'Tanggal Pembelian',
                'Kandang',
                'Nama Supir',
                'Nomor Kendaraan',
                'Nomor SIM',
                'Harga Per KG',
                'Total Ekor',
                'Total KG',
                'Uang Jalan',
                'Uang Tangkap',
                'Solar',
                'Etoll',
                'Order Type',
                'Status',
                'Keterangan',
                'Harga Total',
                'ID Verifikasi',
                'Tanggal Verifikasi',
                'GP',
                'GP RP',
                'Ekor Verifikasi',
                'KG Susut',
                'Susut',
                'KG Verifikasi',
                'Normal',
                'Mati Susulan',
                'Tonase Akhir',
                'Total KG Tiba',
                'ID Pembayaran',
                'Harga Total Pembayaran',
                'Total Bayar',
                'Bukti Pembayaran'
            ]);

            foreach ($deliveryOrderData as $do) {
                $status = $do->status == 0 ? 'Belum Lunas' : 'Lunas';
                $buktiBayar = asset('buktiPembayaranDo/'.$do->bukti_bayar); 
                fputcsv($file, [
                    $do->id_do,
                    $do->id_customer,
                    $do->nama_customer,
                    $do->id_suplier,
                    $do->nama_suplier,
                    $do->tanggal_pembelian,
                    $do->kandang,
                    $do->nama_supir,
                    $do->nomor_kendaraan,
                    $do->nomor_sim,
                    $do->hargaPerKg,
                    $do->total_ekor,
                    $do->total_kg,
                    $do->uang_jalan,
                    $do->uang_tangkap,
                    $do->solar,
                    $do->etoll,
                    $do->order_type,
                    $status,
                    $do->keterangan,
                    $do->harga_total,
                    $do->id_verifikasi,
                    $do->tanggal_verifikasi,
                    $do->gp,
                    $do->gp_rp,
                    $do->ekor,
                    $do->kg_susut,
                    $do->susut,
                    $do->kg,
                    $do->normal,
                    $do->mati_susulan,
                    $do->tonase_akhir,
                    $do->total_kg_tiba,
                    $do->id_payment_order,
                    $do->harga_total,
                    $do->total_bayar,
                    $buktiBayar,
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */

    public function getCustomerInfo(Request $request){
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id_customer', $customerId)->first();
        return view('admin.Input.InputDo', compact('customer'));

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
