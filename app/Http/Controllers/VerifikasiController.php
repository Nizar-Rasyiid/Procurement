<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\DeliveryOrder;
use App\Models\PaymentSo;
use App\Models\Customer;
use App\Models\Verifikasi;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $verifikasi = Verifikasi::get();
        return view('admin.Validasi.verificationTable',compact('verifikasi'));
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
            'id_do' => 'required',
            'tanggal_verifikasi' => 'required',
            'gp' => 'required',
            'kg' => 'required',
            'mati_susulan' => 'required',
            'tonase_akhir' => 'required',
            'total_kg_tiba' => 'required',
            'ekor' => 'nullable',
            'susut' => 'required',
            'normal' => 'required',
            'gp_normal' => 'required',
            'kg_susut' => 'required',
            'gp_rp' => 'required',
            'keterangan' => 'required',
        ]);
        try {
            DB::beginTransaction();
           // Mengambil ID terakhir dari database
        $lastVerif = Verifikasi::latest()->first();

        // Mendapatkan angka dari ID terakhir dan menambahkannya dengan 1
        $lastIdNumber = $lastVerif ? intval(substr($lastVerif->id_verifikasi, 5)) : 0;
        $newIdNumber = $lastIdNumber + 1;

        // Menghasilkan ID dengan format "SO-xxxxxx"
        $id = 'VER-' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);

        // Simpan data baru dengan ID yang sudah di-generate
        $verifikasi = new Verifikasi();
        $verifikasi->id_verifikasi = $id;

        // Lanjutkan menyimpan data lainnya sesuai dengan kebutuhan
        $verifikasi->id_do = $request->input('id_do');
        $verifikasi->tanggal_verifikasi = $request->input('tanggal_verifikasi');
        $verifikasi->gp = $request->input('gp');
        $verifikasi->kg = $request->input('kg');
        $verifikasi->mati_susulan = $request->input('mati_susulan');
        $verifikasi->tonase_akhir = $request->input('tonase_akhir');
        $verifikasi->total_kg_tiba = $request->input('total_kg_tiba');
        if ($request->has('ekor')) {
            $verifikasi->ekor = $request->input('ekor');
        } else {
            // Atur nilai kolom 'ekor' ke null atau nilai default jika dibutuhkan
            $verifikasi->ekor = null; // atau $verifikasi->ekor = 'default value';
        }
        $verifikasi->susut = $request->input('susut');
        $verifikasi->normal = $request->input('normal');
        $verifikasi->gp_normal = $request->input('gp_normal');
        $verifikasi->kg_susut = $request->input('kg_susut');
        $verifikasi->gp_rp = $request->input('gp_rp');
        $verifikasi->keterangan = $request->input('keterangan');

        // Simpan data so
        $verifikasi->save();
            DB::commit();
            return redirect()->route('tableVerifikasi')->with('success', 'Berhasil Menambahkan So');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Customer: ' . $e->getMessage());
        }
    }

    public function getDoJson(Request $request){
        $doId = $request->input('id_do');
        $do = DeliveryOrder::where('id_do', $doId)->first();
    
        if ($do) {
            return response()->json($do); // Return the customer data as JSON
        } else {
            return response()->json(['error' => 'Do not found'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $verifikasi = DB::table('verifikasi')
        // ->join('customer', 'salesorder.id_customer', '=', 'customer.id_customer')
        // ->leftJoin('deliveryorder', 'salesorder.id_so', '=', 'deliveryorder.id_so')
        // ->leftJoin('verifikasi', 'deliveryorder.id_do', '=', 'verifikasi.id_do')
        // ->leftJoin('payment_so', 'salesorder.id_so', '=', 'payment_so.id_so')
        ->select(
            'verifikasi.*', 
            // 'customer.nama as nama',
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
            // 'payment_so.id_payment_so',
            // 'payment_so.harga_total',
            // 'payment_so.jumlah_bayar',
            // 'payment_so.bukti_bayar_penjualan'
        )
        ->where('verifikasi.id', $id)
        ->first();
    
    return view('admin.Details.VerifikasiDetail', compact('verifikasi'));
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
    public function downloadVerifikasi(){
        $verifikasi = DB::table('verifikasi')
        ->select(
            'id_verifikasi',
            'id_do',
            'tanggal_verifikasi',
            'gp',
            'mati_susulan',
            'tonase_akhir',
            'ekor',
            'susut',
            'kg_susut',
            'gp_normal',
            'gp_rp',
            'normal',
            'keterangan'
        )->get();
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="verifikasi.csv"',
        ];

        $callback = function () use ($verifikasi) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID Verifikasi',
                'ID Pembelian',
                'Tanggal Verifikasi',
                'GP',
                'Mati Susulan',
                'Tonase Akhir',
                'Ekor',
                'Susut',
                'KG Susut',
                'GP Normal',
                'GP Rp',
                'Normal',
                'keterangan',
            ]);

            foreach ($verifikasi as $verif) {
                fputcsv($file, [
                    $verif->id_verifikasi,
                    $verif->id_do,
                    $verif->tanggal_verifikasi,
                    $verif->gp,
                    $verif->mati_susulan,
                    $verif->tonase_akhir,
                    $verif->ekor,
                    $verif->susut,
                    $verif->kg_susut,
                    $verif->gp_normal,
                    $verif->gp_rp,
                    $verif->normal,
                    $verif->keterangan,
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
