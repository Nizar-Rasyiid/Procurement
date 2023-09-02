<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Validator;
// use Hash;
// use Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view("admin.Auth.login");
        // $rules = array(
        //     'email' => 'required|string|email',
        //     'password' => 'required|string|min:8',
        // );

        // $cek = Validator::make($request->all(),$rules);

        // if ($cek->fails()) {
        //     $errorString = implode(",",$cek->messages()->all());
        //     return redirect()->route('login')->with('warning',$errorString);
        // } else {
        //     if(Auth::attempt($request->only('email','password'))) {
        //         $user = User::where('email', $request->email)->first();
        //         // $roles = $user->getRoleNames();
        //         // if($roles[0] == 'admin'){
        //             return redirect()->route('dashboard');
        //         // }else{
        //             // return redirect()->route('dashboardUser');
        //         // }
        //     }else{
        //         return redirect()->route('login')->with('warning',"email atau password anda salah");
        //     }
            
        // }
    }

    public function Regis(){
        return view('admin.Auth.Regis');
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