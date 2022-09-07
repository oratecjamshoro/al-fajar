<?php

namespace App\Http\Controllers\admin\mcc;

use App\Http\Controllers\Controller;
use App\Models\MCC;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class MCCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcc= MCC::all();
        return view('admin.mcc.index',compact('mcc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mcci = User::whereHas('roles', function ($q) {
                 $q->Where('name', 'MCCI');
             })->pluck('name','id')->all();

        return view('admin.mcc.create',compact('mcci'));
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
            'branch_name' => 'required|max:255',
            'branch_code' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $mcc = new MCC;

        $mcc->branch_name = $request->branch_name;
        $mcc->branch_code = $request->branch_code;
        $mcc->address = $request->address;
        $mcc->phone = $request->phone;
        $mcc->mcci_id = $request->mcci_id;
        $mcc->save();

        return redirect('mcc')->with('success',"Insert successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MCC  $mCC
     * @return \Illuminate\Http\Response
     */
    public function show(MCC $mCC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MCC  $mCC
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mcc = MCC::find($id);
        $mcci = User::whereHas('roles', function ($q) {
            $q->Where('name', 'MCCI');
        })->pluck('name','id')->all();

        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.mcc.edit',compact('mcc','mcci'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MCC  $mCC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'branch_name' => 'required|max:255',
            'branch_code' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mcci_id' => 'required'
        ]);

        $data = array();
        $data['branch_name'] = $request->branch_name;
        $data['branch_code'] = $request->branch_code;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['mcci_id'] = $request->mcci_id;

        $mcc = MCC::find($id);
        $mcc->update($data);

        return redirect('mcc')->with('success',"MCC updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MCC  $mCC
     * @return \Illuminate\Http\Response
     */
    public function destroy(MCC $mCC)
    {
        //
    }
}
