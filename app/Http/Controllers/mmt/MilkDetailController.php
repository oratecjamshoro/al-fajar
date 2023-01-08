<?php

namespace App\Http\Controllers\mmt;

use App\Models\MCC;
use App\Models\MCC_Milk;
use App\Models\MMT_Milk;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $mcc_id = MCC_Milk::where(['type'=>'Collaction','status'=>0])->whereDate('created_at', Carbon::today())->pluck('mcc_id')->unique();
        $mccs = MCC::get()->whereIn('id',$mcc_id);
        
        return view('mmt.milk_detail.index',compact('mccs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        //MMT Received Milk
        $mmt = new MMT_Milk;
        $mmt->gv = $request->gv;
        $mmt->fat = $request->fat;
        $mmt->lr = $request->lr;
        $mmt->snf = $request->snf;
        $mmt->percentage =$request->percentage;
        $mmt->ts = $request->ts;
        $mmt->temperature = $request->temperature;
        $mmt->shift = $_COOKIE['shift'];
        $mmt->mcc_id = $request->mcc_id;
        $mmt->date = Carbon::today();
        $mmt->status = 1;
        $mmt->save();

        //MMC Left Over Milk
        $mmc_milk = new MCC_Milk;
        $mmc_milk->gv = $request->lgv;
        $mmc_milk->fat = $request->lfat;
        $mmc_milk->lr = $request->llr;
        $mmc_milk->snf = $request->lsnf;
        $mmc_milk->percentage = $request->lpercentage;
        $mmc_milk->ts = $request->lts;
        $mmc_milk->temperature = $request->ltemperature;
        $mmc_milk->shift = $_COOKIE['shift'];
        $mmc_milk->type = 'Left Over';
        $mmc_milk->date = Carbon::today();
        $mmc_milk->mcc_id = $request->mcc_id; 
        $mmc_milk->save();

        //MMC Gain/Loss Milk
        $mmc_milk = new MCC_Milk;
        $mmc_milk->gv = $request->glgv;
        $mmc_milk->fat = $request->glfat;
        $mmc_milk->lr = $request->gllr;
        $mmc_milk->snf = $request->glsnf;
        $mmc_milk->percentage = $request->glpercentage;
        $mmc_milk->ts = $request->lts;
        $mmc_milk->temperature = $request->gltemperature;
        $mmc_milk->shift = $_COOKIE['shift'];
        $mmc_milk->type = 'Gain/Loss';
        $mmc_milk->date = Carbon::today();
        $mmc_milk->mcc_id = $request->mcc_id; 
        $mmc_milk->save();

        //Utitily Reading
        $utility = new Utility;
        $utility->generator_reading = $request->generator_reading;
        $utility->wapda_reading = $request->wapda_reading;
        $utility->ssgc_reading = $request->ssgc_reading;
        $utility->mcc_id = $request->mcc_id;
        $utility->date = Carbon::today();
        $utility->status = 1;
        $utility->save();

        MCC_Milk::where(['type'=>'Collaction','status'=>0,'mcc_id'=>$request->mcc_id])->whereDate('created_at', Carbon::today())->update(['status'=>1]);

        return redirect('mmt_today_list')->with('success',"Sheet closed successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mcc = MCC::where('id',$id)->first();
        $mcc_milk = MCC_Milk::where('mcc_id',$id)->whereDate('created_at', Carbon::today())->first();   
        return view('mmt.milk_detail.add_milk',compact('mcc','mcc_milk'));
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
