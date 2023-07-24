<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\Customer;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SalesOrder::query();
    
        // Filter berdasarkan ID Penjualan jika ada nilai pada input form
        $idSo = $request->input('id_so');
        if ($idSo) {
            $query->where('id_so', 'LIKE', '%' . $idSo . '%');
        }
    
        // Filter berdasarkan status jika ada nilai pada input form
        $status = $request->input('status');
        if ($status !== null) {
            $query->where('status', $status);
        }
    
        // Filter berdasarkan tanggal jika ada nilai pada input form
        $tanggal = $request->input('tanggal');
        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }
    
        $so = $query->get();
    
        return view('admin.ViewList.tableSalesOrder', compact('so'));
    }
    public function halamanInput(Request $request)  {
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id', $customerId)->first();
        return view('admin.Input.InputSo',compact('customer'));
    }
    public function paymentSO()  {
        return view('admin.Payment.SoPayment');
    }


    public function downloadSalesOrder()
    {
        $salesOrderData = SalesOrder::all();
    
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_salesorder.csv"',
        ];
    
        $callback = function () use ($salesOrderData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID Penjualan', 'Tanggal', 'Status', 'Id_Customer', 'Harga Per Kg', 'Jumlah Kg', 'Keterangan']);
    
            foreach ($salesOrderData as $salesOrder) {
                $status = $salesOrder->status == 0 ? 'Belum Lunas' : 'Lunas';
                fputcsv($file, [$salesOrder->id_so, $salesOrder->tanggal, $status, $salesOrder->id_customer, $salesOrder->hargaPerKg, $salesOrder->jumlahKg, $salesOrder->keterangan]);
            }
    
            fclose($file);
        };
    
        return new StreamedResponse($callback, 200, $headers);
    }
    public function getCustomerInfo(Request $request){
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id_customer', $customerId)->first();

        return view('admin.Input.InputSo', compact('customer'));

    }
    public function getCustomerInfoJson(Request $request){
        $customerId = $request->input('id_customer');
        $customer = Customer::where('id_customer', $customerId)->first();
    
        if ($customer) {
            return response()->json($customer); // Return the customer data as JSON
        } else {
            return response()->json(['error' => 'Customer not found'], 404);
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
            'id_customer' => 'required',
            'tanggal' => 'required',
            'jumlahKg' => 'required',
            'hargaPerKg' => 'required',
            'keterangan' => 'required',
        ]);
        try {
            DB::beginTransaction();
           // Mengambil ID terakhir dari database
        $lastSO = SalesOrder::latest()->first();

        // Mendapatkan angka dari ID terakhir dan menambahkannya dengan 1
        $lastIdNumber = $lastSO ? intval(substr($lastSO->id_so, 5)) : 0;
        $newIdNumber = $lastIdNumber + 1;

        // Menghasilkan ID dengan format "SO-xxxxxx"
        $id = 'SO-' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);

        // Simpan data baru dengan ID yang sudah di-generate
        $salesOrder = new SalesOrder();
        $salesOrder->id_so = $id;

        // Lanjutkan menyimpan data lainnya sesuai dengan kebutuhan
        $salesOrder->id_customer = $request->input('id_customer');
        $salesOrder->tanggal = $request->input('tanggal');
        $salesOrder->jumlahKg = $request->input('jumlahKg');
        $salesOrder->hargaPerKg = $request->input('hargaPerKg');
        $salesOrder->keterangan = $request->input('keterangan');

        // Simpan data so
        $salesOrder->save();
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
        $salesOrder = DB::table('salesorder')
        ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
        ->select('salesorder.*', 'customer.nama as nama')
        ->where('salesorder.id', $id)
        ->first();
        return view('admin.Details.SoDetail', compact('salesOrder'));
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
