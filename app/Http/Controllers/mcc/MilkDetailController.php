<?php

namespace App\Http\Controllers\mcc;

use Carbon\Carbon;
use App\Models\MCC;
use App\Models\Supplier;
use App\Models\MilkDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MCC_Milk;
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
        $shift = (isset($_COOKIE['shift']))?$_COOKIE['shift']:'';

        $suppliers_id = MilkDetail::where('shift',$shift)->whereDate('created_at', Carbon::today())->pluck('supplier')->unique();

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

        $received_milk = MilkDetail::whereDate('created_at', Carbon::today())->where(['mcc_id'=>$mcc->id,'status'=>0])->with('supplierdata')->get();
        $left_over = MCC_Milk::where(['mcc_id'=>$mcc->id,'status'=>0,'type'=>'left over'])->get([
            DB::raw('SUM(gv) AS gv'),
            DB::raw('SUM(fat) AS fat'),
            DB::raw('SUM(lr) AS lr'),
            DB::raw('SUM(snf) AS snf'),
            DB::raw('SUM(percentage) AS percentage'),
            DB::raw('SUM(ts) AS ts'),
            DB::raw('SUM(temperature) AS temperature'),
        ]);

        return view('mcc.milk_detail.received_milk',compact('received_milk','left_over'));
    }

    public function close_sheet()
    {
        if(!$mcc = MCC::where('mcci_id',Auth::user()->id)->first('id'))
        {
            return 'You have not assign any MCC';
        }
        $total_milk = MilkDetail::whereDate('created_at', Carbon::today())->where(['mcc_id'=>$mcc->id,'status'=>0])->get([
            DB::raw('SUM(gv) AS gv'),
            DB::raw('SUM(fat*gv) AS fat'),
            DB::raw('SUM(lr*gv) AS lr'),
            DB::raw('SUM(snf*gv) AS snf'),
            DB::raw('SUM(percentage) AS percentage'),
            DB::raw('SUM(ts) AS ts'),
            DB::raw('SUM(temperature*gv) AS temperature'),
        ]);

        $left_over = MCC_Milk::where(['mcc_id'=>$mcc->id,'status'=>0,'type'=>'left over'])->get([
            DB::raw('SUM(gv) AS gv'),
            DB::raw('SUM(fat*gv) AS fat'),
            DB::raw('SUM(lr*gv) AS lr'),
            DB::raw('SUM(snf*gv) AS snf'),
            DB::raw('SUM(percentage) AS percentage'),
            DB::raw('SUM(ts) AS ts'),
            DB::raw('SUM(temperature*gv) AS temperature'),
        ]);


        if($total_milk[0]->gv > 0 || $left_over[0]->gv > 0)
        {
            //New Milk
            $gv =$total_milk[0]->gv;
            $fat =$total_milk[0]->fat;
            $lr =$total_milk[0]->lr;
            $snf =$total_milk[0]->snf;
            $per =$total_milk[0]->percentage;
            $ts =$total_milk[0]->ts;
            $temp =$total_milk[0]->temperature;
            
            //Left Over Milk
            $l_gv =$left_over[0]->gv;
            $l_fat =$left_over[0]->fat;
            $l_lr =$left_over[0]->lr;
            $l_snf =$left_over[0]->snf;
            $l_per =$left_over[0]->percentage;
            $l_ts =$left_over[0]->ts;
            $l_temp =$left_over[0]->temperature;
            

            $mmc_milk = new MCC_Milk;
            $mmc_milk['gv'] = ($gv+$l_gv);
            $mmc_milk['fat'] = ($fat+$l_fat)/($gv+$l_gv);
            $mmc_milk['lr'] = ($lr+$l_lr)/($gv+$l_gv);
            $mmc_milk['snf'] = ($snf+$l_snf)/($gv+$l_gv);
            $mmc_milk['percentage'] = ($per+$l_per);
            $mmc_milk['ts'] = ($ts+$l_ts);
            $mmc_milk['temperature'] = ($temp+$l_temp)/($gv+$l_gv);
            $mmc_milk['shift'] = $_COOKIE['shift'];
            $mmc_milk['type'] = 'Collaction';
            $mmc_milk['date'] = date("Y-m-d");
            $mmc_milk['mcc_id'] = $mcc->id; 
            $mmc_milk->save();

            MilkDetail::whereDate('created_at', Carbon::today())->where(['mcc_id'=>$mcc->id,'status'=>0])->update(['status'=>1]);
            MCC_Milk::where(['mcc_id'=>$mcc->id,'status'=>0,'type'=>'left over'])->update(['status'=>1]);

            return redirect('received_milk')->with('success',"Sheet closed successfully");
        }
        else
        {
            return redirect('received_milk')->with('error',"Sheet is empty");
        }
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
