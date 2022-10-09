<?php

namespace App\Http\Controllers\mcc;

use Carbon\Carbon;
use App\Models\MCC;
use App\Models\Supplier;
use App\Models\MilkDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MilkDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers_id = MilkDetail::whereDate('created_at', Carbon::today())->pluck('supplier')->unique();

        $mcc = MCC::where('mcci_id',Auth::user()->id)->first('id');
        $suppliers = Supplier::where('mcc_id',$mcc->id)->whereNotIn('id',$suppliers_id)->get();
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
        $validated = $request->validate([
            'tarif_chanal' => 'required|max:255',
            'gv' => 'required',
            'fat' => 'required',
            'lr' => 'required',
            'snf' => 'required',
            'id' => 'required',
            'temperature' => 'required'
        ]);

        if(!$mcc = MCC::where('mcci_id',Auth::user()->id)->first('id'))
        {
            return 'You have not assign any MCC';
        }

        $milk = new MilkDetail;

        $milk->tarif_chanal = $request->tarif_chanal;
        $milk->shift = $_COOKIE['shift'];
        $milk->supplier = $request->id;
        $milk->gv = $request->gv;
        $milk->fat = $request->fat;
        $milk->lr = $request->lr;
        $milk->snf = $request->snf;
        $milk->percentage = $request->percentage;
        $milk->ts = $request->ts;
        $milk->temperature = $request->temperature;
        $milk->mcc_id = $mcc->id;
        $milk->save();
        
        return redirect('milk_detail')->with('success',"Insert successfully");
    }

    public function received_milk()
    {
        if(!$mcc = MCC::where('mcci_id',Auth::user()->id)->first('id'))
        {
            return 'You have not assign any MCC';
        }

        $received_milk = MilkDetail::whereDate('created_at', Carbon::today())->where('mcc_id',$mcc->id)->with('supplierdata')->get();

        return view('mcc.milk_detail.received_milk',compact('received_milk'));
    }

    public function close_sheet()
    {

        if(!$mcc = MCC::where('mcci_id',Auth::user()->id)->first('id'))
        {
            return 'You have not assign any MCC';
        }

        $total_milk = MilkDetail::select(
            DB::raw("SUM(gv) as gv"),
            DB::raw("SUM(fat) as fat"),
            DB::raw("SUM(lr) as lr"),
            DB::raw("SUM(snf) as snf"),
            DB::raw("SUM(percentage) as percentage"),
            DB::raw("SUM(ts) as ts"),
            DB::raw("SUM(temperature) as temperature")
            )->whereDate('created_at', Carbon::today())->where('mcc_id',$mcc->id)->first();

            return view('mcc.milk_detail.close_sheet',compact('total_milk'));

        
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
