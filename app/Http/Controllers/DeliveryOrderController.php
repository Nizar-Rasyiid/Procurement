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
        $query = DeliveryOrder::query();
    
        // Filter berdasarkan ID Penjualan jika ada nilai pada input form
        $idDo = $request->input('id_do');
        if ($idDo) {
            $query->where('id_do', 'LIKE', '%' . $idDo . '%');
        }
    
        // Filter berdasarkan status jika ada nilai pada input form
        $status = $request->input('status');
        if ($status !== null) {
            $query->where('status', $status);
        }
    
        // Filter berdasarkan tanggal jika ada nilai pada input form
        $tanggal = $request->input('tanggal_pembelian');
        if ($tanggal) {
            $query->whereDate('tanggal_pembelian', $tanggal);
        }
    
        $do = $query->get();
        return view('admin.ViewList.tableDeliveryOrder', compact('do'));
    }

    public function halamanInput(Request $request) {
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id', $customerId)->first();
        return view('admin.Input.InputDo',compact('customer'));
    }
    public function paymentDO() {
        return view('admin.Payment.DoPayment');
    }
    public function validateDO() {
        return view('admin.Validasi.validationDo');
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
    public function show(Request $request){
        $deliveryOrder = DB::table('deliveryorder')
        ->join('customer', 'deliveryorder.id_customer', '=', 'customer.id_customer')
        ->join('salesorder', 'deliveryorder.id_so','=','salesorder.id_so')
        ->select('deliveryorder.*', 'customer.nama as nama');
        // return $deliveryOrder;
        return view('admin.Input.inputDO');
    }

    public function getSoInfoJson(Request $request)
    {
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

        $deliveryOrder->save();
            DB::commit();
            return redirect()->route('tableDeliveryOrder')->with('success', 'Berhasil Menambahkan DO');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Customer: ' . $e->getMessage());
        }
    } 

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $request->validate([
    //         'id_customer' => 'required',
    //         'tanggal' => 'required',
    //         'jumlahKg' => 'required',
    //         'hargaPerKg' => 'required',
    //         'keterangan' => 'required',
    //     ]);
    //     try {
    //         DB::beginTransaction();
    //        // Mengambil ID terakhir dari database
    //     $lastDO = DeliveryOrder::latest()->first();

    //     // Mendapatkan angka dari ID terakhir dan menambahkannya dengan 1
    //     $lastIdNumber = $lastDO ? intval(substr($lastDO->id_do, 5)) : 0;
    //     $newIdNumber = $lastIdNumber + 1;

    //     // Menghasilkan ID dengan format "SO-xxxxxx"
    //     $id = 'DO-' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);

    //     // Simpan data baru dengan ID yang sudah di-generate
    //     $deliveryOrder = new DeliveryOrder();
    //     $deliveryOrder->id_do = $id;

    //     // Lanjutkan menyimpan data lainnya sesuai dengan kebutuhan
    //     $deliveryOrder->id_customer = $request->input('id_customer');
    //     $deliveryOrder->tanggal = $request->input('tanggal');
    //     $deliveryOrder->jumlahKg = $request->input('jumlahKg');
    //     $deliveryOrder->hargaPerKg = $request->input('hargaPerKg');
    //     $deliveryOrder->keterangan = $request->input('keterangan');

    //     // Simpan data so
    //     $deliveryOrder->save();
    //         DB::commit();
    //         return redirect()->route('tableDeliveryOrder')->with('success', 'Berhasil Menambahkan Do');
    //     } catch (\Exception $e) {
    //         dd($e);
    //         DB::rollback();
    //         return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Customer: ' . $e->getMessage());
    //     }
    // }

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
