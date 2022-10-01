<?php

namespace App\Http\Controllers\employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inv_Category;
use App\Models\Inv_Item;
use App\Models\Req_Inventory;
use Auth;

class InventoryRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $req_inv = Req_Inventory::where('user_id',$user)->get();

        return view('employees.inv_request.index',compact('req_inv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Inv_Category::all()->pluck('title','id');

        $items = Inv_Item::all()->pluck('item_name','id');
        return view('employees.inv_request.create',compact('category','items'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'item' => 'required',
            'qty' => 'required'
        ]);

        $req_inventory = new Req_Inventory;

        $req_inventory->category_id = $request->category;
        $req_inventory->item_id = $request->item;
        $req_inventory->qty = $request->qty;
        $req_inventory->remarks = $request->remarks;
        $req_inventory->save();

        return redirect('inv_request')->with('success',"Sent request successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
