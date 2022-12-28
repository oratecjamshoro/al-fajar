@extends('layouts.web')
@section('title', 'Dashboard')
@section('content')

<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Milk Detail</a></li>
                                            <li class="breadcrumb-item active">Add</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Milk (Shift: <span id='shift'></span>)</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <strong>Branch Code</strong>
                                        </div>
                                        <div class="col-md-3">
                                            {{$mcc->branch_code}}
                                        </div>
                                        <div class="col-md-3">
                                            <strong>Name of MCC</strong>
                                        </div>
                                        <div class="col-md-3">
                                            {{$mcc->branch_name}}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <strong>Contact</strong>
                                        </div>
                                        <div class="col-md-3">
                                            {{$mcc->phone}}
                                        </div>
                                        <div class="col-md-3">
                                            <strong>Address</strong>
                                        </div>
                                        <div class="col-md-3">
                                            {{$mcc->address}}
                                        </div>
                                    </div>
                                    <form action="{{Route('mmt_milk.store')}}" method="post" enctype="multipart/form-data" class="parsley-examples" novalidate="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>G.V</th>
                                                    <th>FAT</th>
                                                    <th>L.R</th>
                                                    <th>SNF</th>
                                                    <th>6%</th>
                                                    <th>TS</th>
                                                    <th>Temperature</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>MCC Total</td>
                                                        <td>{{round($mcc_milk->gv,2)}}</td>
                                                        <td>{{round($mcc_milk->fat,2)}}</td>
                                                        <td>{{round($mcc_milk->lr,2)}}</td>
                                                        <td>{{round($mcc_milk->snf,2)}}</td>
                                                        <td>{{round($mcc_milk->percentage,2)}}</td>
                                                        <td>{{round($mcc_milk->ts,2)}}</td>
                                                        <td>{{round($mcc_milk->temperature,2)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>MMT Rec:</td>
                                                        <td>
                                                            <input type="text" name="gv" id="gv" parsley-trigger="change" required
                                                            placeholder="Enter G.V" class="form-control cal">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="fat" id="fat" parsley-trigger="change" required
                                                            placeholder="Enter FAT" class="form-control cal">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="lr" id="lr" parsley-trigger="change" required
                                                            placeholder="Enter L.R" class="form-control cal">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="snf-temp"
                                                            placeholder="Enter SNF" class="form-control cal" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="percentage-temp" 
                                                            placeholder="Enter 6%" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ts-temp"
                                                            placeholder="Enter TS" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="temperature" id="temp" parsley-trigger="change" required
                                                            placeholder="Enter Temperature" class="form-control cal">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Left Over</td>
                                                        <td>
                                                            <input type="text" name="lgv" id="lgv" parsley-trigger="change" required
                                                            placeholder="Enter G.V" class="form-control cal">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="lfat" id="lfat" parsley-trigger="change" required
                                                            placeholder="Enter FAT" class="form-control cal">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="llr" id="llr" parsley-trigger="change" required
                                                            placeholder="Enter L.R" class="form-control cal">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="" id="lsnf-temp"
                                                            placeholder="Enter SNF" class="form-control cal" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="lpercentage-temp" 
                                                            placeholder="Enter 6%" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="lts-temp"
                                                            placeholder="Enter TS" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="ltemperature" id="ltemp" parsley-trigger="change" required
                                                            placeholder="Enter Temperature" class="form-control cal">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td >Loss/Gain</td>
                                                        <td id="l_gv">0</td>
                                                        <td id="l_fat">0</td>
                                                        <td id="l_lr">0</td>
                                                        <td id="l_snf">0</td>
                                                        <td id="l_perc">0</td>
                                                        <td id="l_ts">0</td>
                                                        <td id="l_temp">0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h5>Utility</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Generator Reading<span class="text-danger">*</span></label>
                                                        <input type="text" name="generator_reading" parsley-trigger="change" required
                                                            placeholder="Enter Generator Reading" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>WAPDA Reading<span class="text-danger">*</span></label>
                                                        <input type="text" name="wapda_reading" parsley-trigger="change" required
                                                            placeholder="Enter WAPDA Reading" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>SSGC Reading<span class="text-danger">*</span></label>
                                                        <input type="text" name="ssgc_reading" parsley-trigger="change" required
                                                            placeholder="Enter SSGC Reading" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <input type="hidden" name="snf" id="snf">
                                                <input type="hidden" name="percentage" id="percentage">
                                                <input type="hidden" name="ts" id="ts">
                                                
                                                <input type="hidden" name="lsnf" id="lsnf">
                                                <input type="hidden" name="lpercentage" id="lpercentage">
                                                <input type="hidden" name="lts" id="lts">
                                                
                                                <input type="hidden" name="glgv" id="glgv">
                                                <input type="hidden" name="glfat" id="glfat">
                                                <input type="hidden" name="gllr" id="gllr">
                                                <input type="hidden" name="glsnf" id="glsnf">
                                                <input type="hidden" name="glpercentage" id="glpercentage">
                                                <input type="hidden" name="glts" id="glts">
                                                <input type="hidden" name="gltemperature" id="gltemp">

                                                <input type="hidden" name="mcc_id" value="{{$mcc->id}}">

                                                <div class="col-md-12">
                                                    <button class="btn btn-success sheet-close">Close Sheet</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->                        
                    </div> <!-- end container-fluid -->
                </div> <!-- end content -->

@endsection

@section('script')
<!-- Plugin js-->
<script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

<!-- Validation init js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

<script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

<script>
    if(localStorage.shift && getCookie('shift') !="")
    {
        $('#shift').html(localStorage.shift);
    }
    else
    {
        Swal.fire({
            title:"Sorry",
            text:"Please go back and select Shift!",
            type:"warning",
        }).then(function(t){
            localStorage.shift="";
            history.back();
        })
        
    }

    function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
    }

    $('.cal').on('keyup change', function(e) {

        let gv = ($('#gv').val())?parseFloat($('#gv').val()):0.00;
        let fat = ($('#fat').val())?parseFloat($('#fat').val()):0.00;
        let lr = ($('#lr').val())?parseFloat($('#lr').val()):0.00;
        let temp = ($('#temp').val())?parseFloat($('#temp').val()):0.00;

        let snf = 0;

        if(lr >0)
        {
            snf = ((lr/4)+(fat*0.22+0.72));
        }

        let perc = gv*fat/6;
        let ts = (fat+snf)*gv/13;

        $('#snf').val(snf);
        $('#percentage').val(perc);
        $('#ts').val(ts);

        $('#snf-temp').val((snf).toFixed(2));
        $('#percentage-temp').val((perc).toFixed(2));
        $('#ts-temp').val((ts).toFixed(2));



        let lgv = ($('#lgv').val())?parseFloat($('#lgv').val()):0.00;
        let lfat = ($('#lfat').val())?parseFloat($('#lfat').val()):0.00;
        let llr = ($('#llr').val())?parseFloat($('#llr').val()):0.00;
        let ltemp = ($('#ltemp').val())?parseFloat($('#ltemp').val()):0.00;

        let lsnf = 0;

        if(llr >0)
        {
            lsnf = ((llr/4)+(lfat*0.22+0.72));
        }

        let lperc = lgv*lfat/6;
        let lts = (lfat+lsnf)*lgv/13;

        $('#lsnf').val(lsnf);
        $('#lpercentage').val(lperc);
        $('#lts').val(lts);

        $('#lsnf-temp').val((lsnf).toFixed(2));
        $('#lpercentage-temp').val((lperc).toFixed(2));
        $('#lts-temp').val((lts).toFixed(2));




        let l_gv = (gv+lgv)-"{{$mcc_milk->gv}}";
        let l_fat = (fat+lfat)-"{{$mcc_milk->fat}}";
        let l_lr = (lr+llr)-"{{$mcc_milk->lr}}";
        let l_snf = (snf+lsnf)-"{{$mcc_milk->snf}}";
        let l_perc = (perc+lperc)-"{{$mcc_milk->percentage}}";
        let l_ts = (ts+lts)-"{{$mcc_milk->ts}}";
        let l_temp = (temp+ltemp)-"{{$mcc_milk->temperature}}";
        
        $('#glgv').val(l_gv);
        $('#glfat').val(l_fat);
        $('#gllr').val(l_lr);
        $('#glsnf').val(l_snf);
        $('#glpercentage').val(l_perc);
        $('#glts').val(l_ts);
        $('#gltemp').val(l_temp);

        $('#l_gv').html((l_gv).toFixed(2));
        $('#l_fat').html((l_fat).toFixed(2));
        $('#l_lr').html((l_lr).toFixed(2));
        $('#l_snf').html((l_snf).toFixed(2));
        $('#l_perc').html((l_perc).toFixed(2));
        $('#l_ts').html((l_ts).toFixed(2));
        $('#l_temp').html((l_temp).toFixed(2));

    });
    
</script>

@endsection