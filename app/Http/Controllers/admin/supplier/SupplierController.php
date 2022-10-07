<?php

namespace App\Http\Controllers\admin\supplier;

use App\Models\MCC;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->getRoleNames()[0] == 'admin')
        {
            $suppliers = Supplier::all();
        }
        else
        {
            $mcc = MCC::where('mcci_id',Auth::user()->id)->first('id');
            $suppliers = Supplier::where('mcc_id',$mcc->id)->get();
        }
        

        
        return view('admin.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mcc = MCC::where('mcci_id',Auth::user()->id)->first('id');
        if(!$mcc)
        {
            return 'You have not assign any MCC';
        }

        $image ="no-image.png";

        if($request->image)
        {
            $image = time().'.'.$request->image->extension();
            $path = public_path('images/suppliers');
            $request->image->move($path, $image);
        }
        $image ='images/suppliers/'.$image;

        
        $supplier = new Supplier;

        $supplier->name = $request->name;
        $supplier->father_name = $request->father_name;
        $supplier->cnic = $request->cnic;
        $supplier->contact = $request->contact;
        $supplier->other_contact = $request->other_contact;
        $supplier->address = $request->address;
        $supplier->image = $image;
        $supplier->status = $request->status;
        $supplier->mcc_id = $mcc->id;
        $supplier->save();

        return redirect('supplier')->with('success',"Insert successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
