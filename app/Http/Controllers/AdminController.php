<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller{

// Halaman Goes Here
    public function index()  {
        return view("home");
    }  
    public function indexTable()  {
        $admins = Admin::all();
        return view("admin.ViewList.tables", compact('admins'));
    }
    public function halamanStoreAdmin()  {
        return view("admin.Input.store");
    }

    public function showCustomer() {
        $customers = Customer::all();
        return view("admin.ViewList.tableCustomer",compact('customers'));
    }

    public function show($id) {
        
    }
    public function storeAdmin(Request $request) {
        $request->validate([
            'nama' => 'required',
        ]);
    
        try {
            DB::beginTransaction();
    
            $admin = new Admin();
            $admin->nama = $request->input('nama');
            // Tambahkan atribut lainnya sesuai dengan kebutuhan
            $admin->save();
            DB::commit();
    
            return redirect()->back()->with('success', 'Admin berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan admin: ' . $e->getMessage());
        }
          }

        public function deleteAdmin(Request $request) {
          if (in_array($request->method(), ['POST', 'PUT', 'PATCH'])
          && $request->isJson()
          ) {
              $dataReq = $request->json()->all();
              //json_decode($dataReq, true);
              $arrDataReq =json_decode(json_encode($dataReq),true);
              $id=$arrDataReq["id"];
          }else{
              $id=$request->input["id"];
          }

          $data = Customer::find($id_customer);
          try {
              if($data->delete()){
                  $response = [
                      'message'		=> 'Delete Customer Sukses',
                      'data' 		    => $data,
                  ];

                  return response()->json($response, 200);
              }
          } catch (\Exception $e) {
              DB::rollback();
              $response = [
                  'message'        => 'Transaction DB Error',
                  'data'      => $e->getMessage()
              ];
              return response()->json($response, 500);
          }
        }
    public function updateAdmin(Request $request) {
            
            //
            if (in_array($request->method(), ['POST', 'PUT', 'PATCH'])
                && $request->isJson()
            ) {
                $dataReq = $request->json()->all();
                $arrDataReq =json_decode(json_encode($dataReq),true);
                $nama=$arrDataReq["nama"];
                $id=$arrDataReq["id"];
            }else{
                $nama=$request->input["nama"];
                $id=$request->input["id"];
            }
                  
            try {
                DB::beginTransaction();
          
                $p = Admin::find($id);

                    $p->nama = $nama;
                $p->save();
                DB::commit();

                $response = [
                    'message'        => 'Update Sukses',
                    'data'         => $p
                ];

                return response()->json($response, 200);

            } catch (\Exception $e) {
              DB::rollback();
                $response = [
                    'message'        => 'Transaction DB Error',
                    'data'      => $e->getMessage()
                ];
                return response()->json($response, 200);
            }
            $response = [
                'message'        => 'An Error Occured'
            ];

            return response()->json($response, 200);
    }


}
