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
                                                        <td >Left Over</td>
                                                        <td id="l_gv">0</td>
                                                        <td id="l_fat">0</td>
                                                        <td id="l_lr">0</td>
                                                        <td id="l_snf">0</td>
                                                        <td id="l_perc">0</td>
                                                        <td id="l_ts">0</td>
                                                        <td id="l_temp">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>MMT Total</td>
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
                                                            <input type="text" name="snf" id="snf" parsley-trigger="change" required
                                                            placeholder="Enter SNF" class="form-control cal" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="percentage" id="percentage" parsley-trigger="change" 
                                                            placeholder="Enter 6%" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="ts" id="ts" parsley-trigger="change" required
                                                            placeholder="Enter TS" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="temperature" id="temp" parsley-trigger="change" required
                                                            placeholder="Enter Temperature" class="form-control cal">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success sheet-close">Close Sheet</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        $('#snf').val((snf).toFixed(2));
        $('#percentage').val((perc).toFixed(2));
        $('#ts').val((ts).toFixed(2));

        let l_gv = "{{$mcc_milk->gv}}"-gv;
        let l_fat = "{{$mcc_milk->fat}}"-fat;
        let l_lr = "{{$mcc_milk->lr}}"-lr;
        let l_snf = "{{$mcc_milk->snf}}"-snf
        let l_perc = "{{$mcc_milk->percentage}}"-perc;
        let l_ts = "{{$mcc_milk->ts}}"-ts;
        let l_temp = "{{$mcc_milk->temperature}}"-temp;
        
        
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