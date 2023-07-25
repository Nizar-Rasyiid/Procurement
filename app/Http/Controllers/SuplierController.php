<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Suplier;
use RealRashid\SweetAlert\Facades\Alert;
class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supliers = DB::table('suplier')->simplePaginate(5);
        return view('admin.ViewList.tableSuplier',compact('supliers'));
    }
    public function halamanStore()
    {
        return view('admin.Input.suplierStore');
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
            'nama_suplier' => 'required',
            'nomor_telepon_suplier' => 'required',
            'alamat' => 'required',
            'nomor_npwp' => 'required',
            'npwp' => 'required',
            'ktp' => 'required',
        ]);
        try {
            DB::beginTransaction();

            // Mengambil ID terakhir dari database
            $lastSuplier = Suplier::latest()->first();
            
            // Mendapatkan angka dari ID terakhir dan menambahkannya dengan 1
            $lastIdNumber = $lastSuplier ? intval(substr($lastSuplier->id_suplier, 4)) : 0;
            $newIdNumber = $lastIdNumber + 1;
            
            // Menghasilkan ID dengan format "SUP-xxxxxx"
            $id = 'SUP-' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);
            
            // Simpan data baru dengan ID yang sudah di-generate
            $suplier = new Suplier();
            $suplier->id_suplier = $id;
            $suplier->nama_suplier = $request->input('nama_suplier');
            $suplier->alamat = $request->input('alamat');
            $suplier->nomor_npwp = $request->input('nomor_npwp');
            $suplier->npwp = $request->input('npwp');
            $suplier->ktp = $request->input('ktp');
            $suplier->nomor_telepon_suplier = $request->input('nomor_telepon_suplier');
            $suplier->save();
            DB::commit();
            return redirect()->route('tableSuplier')->with('success', 'Berhasil Menambahkan Suplier');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan Suplier: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $suplier = Suplier::find($id);
        
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
