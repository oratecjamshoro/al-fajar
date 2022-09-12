<?php

namespace App\Http\Controllers\mcc;

use App\Models\Supplier;
use App\Models\MilkDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilkDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('mcc.milk_detail.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MilkDetail  $milkDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::where('id',$id)->first();   
        return view('mcc.milk_detail.add_milk',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MilkDetail  $milkDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MilkDetail $milkDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MilkDetail  $milkDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MilkDetail $milkDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MilkDetail  $milkDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MilkDetail $milkDetail)
    {
        //
    }
}
