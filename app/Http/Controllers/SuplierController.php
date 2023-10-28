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
            'npwp' => 'nullable',
            'ktp' => 'nullable',
        ]);
        try {
            DB::beginTransaction();
            $lastSuplier = Suplier::latest()->first();

            // Mendapatkan angka dari ID terakhir dan menambahkannya dengan 1
            $lastIdNumber = $lastSuplier ? intval(substr($lastSuplier->id_suplier, 5)) : 0;
            $newIdNumber = $lastIdNumber + 1;
    
            // Menghasilkan ID dengan format "CUST-xxxxxx"
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
            if ($request->hasFile('ktp')) {
                $request->file('ktp')->move('ktpSuplier/',$request->file('ktp')->getClientOriginalName());
                $suplier->ktp = $request->file('ktp')->getClientOriginalName();
            }
            if ($request->hasFile('npwp')) {
                $request->file('npwp')->move('npwpSuplier/',$request->file('npwp')->getClientOriginalName());
                $suplier->npwp = $request->file('npwp')->getClientOriginalName();
            }
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
    public function show(string $id)
    {
       $Suplier = DB::table('suplier')
                        ->select('suplier.*')
                        ->where('suplier.id',$id)
                        ->first();
        return view('admin.Details.suplierDetail',compact('Suplier'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Suplier = Suplier::findOrFail($id);

        return view("admin.Edit.suplierEdit",compact("Suplier"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
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
    
            // Temukan suplier berdasarkan ID
            $suplier = Suplier::find($id);
    
            if (!$suplier) {
                return redirect()->back()->with('error', 'Suplier tidak ditemukan.');
            }
    
            $suplier->nama_suplier = $request->input('nama_suplier');
            $suplier->alamat = $request->input('alamat');
            $suplier->nomor_npwp = $request->input('nomor_npwp');
            $suplier->nomor_telepon_suplier = $request->input('nomor_telepon_suplier');
    
            if ($request->hasFile('ktp')) {
                $request->file('ktp')->move('ktpSuplier/', $request->file('ktp')->getClientOriginalName());
                $suplier->ktp = $request->file('ktp')->getClientOriginalName();
            }
    
            if ($request->hasFile('npwp')) {
                $request->file('npwp')->move('npwpSuplier/', $request->file('npwp')->getClientOriginalName());
                $suplier->npwp = $request->file('npwp')->getClientOriginalName();
            }
    
            $suplier->save();
            DB::commit();
    
            return redirect()->route('tableSuplier')->with('success', 'Berhasil Menambahkan Suplier');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui Suplier: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
