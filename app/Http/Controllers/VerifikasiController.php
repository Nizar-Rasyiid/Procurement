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

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data = Verifikasi::where('id', $id)->first();
        return view("admin.Details.verif");
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
            'ekor' => 'required',
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
        $verifikasi->ekor = $request->input('ekor');
        $verifikasi->susut = $request->input('susut');
        $verifikasi->normal = $request->input('normal');
        $verifikasi->gp_normal = $request->input('gp_normal');
        $verifikasi->kg_susut = $request->input('kg_susut');
        $verifikasi->gp_rp = $request->input('gp_rp');
        $verifikasi->keterangan = $request->input('keterangan');

        // Simpan data so
        $verifikasi->save();
            DB::commit();
            return redirect()->route('tableSalesOrder')->with('success', 'Berhasil Menambahkan So');
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
