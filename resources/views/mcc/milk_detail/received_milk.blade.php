@extends('layouts.web')
@section('title', 'Received Milk')
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
                                            <li class="breadcrumb-item active">Received Milk</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Received Milk List</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        
                                        <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tarif Chanal</th>
                                                <th>Shift</th>
                                                <th>Supplier Name</th>
                                                <th>G.V</th>
                                                <th>FAT</th>
                                                <th>L.R</th>
                                                <th>SNF</th>
                                                <th>6%</th>
                                                <th>TS</th>
                                                <th>Temperature</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $gv=0;
                                                $fat=0;
                                                $lr=0;
                                                $snf=0;
                                                $percentage=0;
                                                $ts=0;
                                                $temperature=0;
                                                $sr = 1;
                                            ?>
                                            @foreach($received_milk as $val)
                                            <?php
                                                $gv +=$val->gv;
                                                $fat +=$val->fat;
                                                $lr +=$val->lr;
                                                $snf +=$val->snf;
                                                $percentage +=$val->percentage;
                                                $ts +=$val->ts;
                                                $temperature +=$val->temperature;
                                            ?>
                                                <tr>
                                                    <td>{{$sr++}}</td>
                                                    <td>{{$val->tarif_chanal}}</td>
                                                    <td>{{$val->shift}}</td>
                                                    <td>{{$val->supplierdata->name}}</td>
                                                    <td>{{$val->gv}}</td>
                                                    <td>{{$val->fat}}</td>
                                                    <td>{{$val->lr}}</td>
                                                    <td>{{round($val->snf,2)}}</td>
                                                    <td>{{round($val->percentage,2)}}</td>
                                                    <td>{{round($val->ts,2)}}</td>
                                                    <td>{{$val->temperature}}</td>
                                                    <td><a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="system_gen">
                                                    <th colspan="4">System Generated Total</th>
                                                    <th>{{$gv}}</th>
                                                    <th>{{$fat}}</th>
                                                    <th>{{$lr}}</th>
                                                    <th>{{round($snf,2)}}</th>
                                                    <th>{{round($percentage,2)}}</th>
                                                    <th>{{round($ts,2)}}</th>
                                                    <th>{{round($temperature,2)}}</th>
                                                    <th></th>
                                                </tr>
                                                <tr class="rem">
                                                    <th colspan="4">Gain/Loss</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">MCC Total</th>
                                                    <th><input type="text" name="gv" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th><input type="text" name="fat" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th><input type="text" name="lr" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th><input type="text" name="snf" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th><input type="text" name="percentage" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th><input type="text" name="ts" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th><input type="text" name="temperature" class="form-control cal" parsley-trigger="change" required></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-success sheet-close">Close Sheet</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

@endsection

@section('style')
<!-- third party css -->
<link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')

<!-- Required datatable js -->
<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/vfs_fonts.js"></script>
<script src="assets/libs/datatables/buttons.html5.min.js"></script>
<script src="assets/libs/datatables/buttons.print.min.js"></script>
<script src="assets/libs/datatables/buttons.colVis.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatables init -->
<script src="assets/js/pages/datatables.init.js"></script>

<script>

$('.sheet-close').click(function(){
    Swal.fire({
        title:"Are you sure?",
        text:"Do you want to close sheet?",
        type:"warning",
        showCancelButton:!0,
        confirmButtonColor:"#3085d6",
        cancelButtonColor:"#d33",
        confirmButtonText:"Yes, close it!"
    }).then(function(t)
    {
        if(t.value)
        {
            window.location.href = "{{ route('close_sheet')}}";
            //Swal.fire("Closed!","Your sheet has been closed.","success")
        }
    })
})

$('.cal').keyup(function(){
    var gv = $('input[name=gv]').val();
    var fat = $('input[name=fat]').val();
    var lr = $('input[name=lr]').val();
    var snf = $('input[name=snf]').val();
    var percentage = $('input[name=percentage]').val();
    var ts = $('input[name=ts]').val();
    var temp = $('input[name=temperature]').val();

    var sys_gv = $('.system_gen').children('th').eq(1).text();
    $('.rem').children('th').eq(1).text(gv-sys_gv);
    
    var sys_fat = $('.system_gen').children('th').eq(2).text();
    $('.rem').children('th').eq(2).text(fat-sys_fat);
    
    var sys_lr = $('.system_gen').children('th').eq(3).text();
    $('.rem').children('th').eq(3).text(lr-sys_lr);
    
    var sys_snf = $('.system_gen').children('th').eq(4).text();
    $('.rem').children('th').eq(4).text(snf-sys_snf);

    var sys_percentage = $('.system_gen').children('th').eq(5).text();
    $('.rem').children('th').eq(5).text(percentage-sys_percentage);
    
    var sys_ts = $('.system_gen').children('th').eq(6).text();
    $('.rem').children('th').eq(6).text(ts-sys_ts);
    
    var sys_temp = $('.system_gen').children('th').eq(7).text();
    $('.rem').children('th').eq(7).text(temp-sys_temp);
    
});

</script>

@endsection
