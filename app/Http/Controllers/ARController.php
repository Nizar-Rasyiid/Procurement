<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AR;
use Illuminate\Support\Facades\DB;

class ARController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar=AR::all();
        return view("admin.ViewList.tableAR",compact("ar"));
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
