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
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $sr=0;
                                                $gv=0;
                                                $fat=0;
                                                $lr=0;
                                                $snf=0;
                                                $percentage=0;
                                                $ts=0;
                                                $temperature=0;
                                                
                                            ?>
                                            @foreach($received_milk as $val)
                                            <?php
                                                $gv +=$val->gv;
                                                $fat +=$val->fat*$val->gv;
                                                $lr +=$val->lr*$val->gv;
                                                $snf +=$val->snf*$val->gv;
                                                $percentage +=$val->percentage;
                                                $ts +=$val->ts;
                                                $temperature +=$val->temperature*$val->gv;
                                            ?>
                                                <tr>
                                                    <td>{{++$sr}}</td>
                                                    <td>{{$val->tarif_chanal}}</td>
                                                    <td>{{$val->shift}}</td>
                                                    <td>{{$val->supplierdata->name}}</td>
                                                    <td>{{num_format($val->gv)}}</td>
                                                    <td>{{num_format($val->fat)}}</td>
                                                    <td>{{num_format($val->lr)}}</td>
                                                    <td>{{num_format($val->snf)}}</td>
                                                    <td>{{num_format($val->percentage)}}</td>
                                                    <td>{{num_format($val->ts)}}</td>
                                                    <td>{{num_format($val->temperature)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">TOTAL</th>
                                                    <th>{{num_format($gv)}}</th>
                                                    <th>{{num_format(($gv>0)?$fat/$gv:0)}}</th>
                                                    <th>{{num_format(($gv>0)?$lr/$gv:0)}}</th>
                                                    <th>{{num_format(($gv>0)?$snf/$gv:0)}}</th>
                                                    <th>{{num_format(($gv>0)?$percentage:0)}}</th>
                                                    <th>{{num_format(($gv>0)?$ts:0)}}</th>
                                                    <th>{{num_format(($gv>0)?$temperature/$gv:0)}}</th>
                                                </tr>
                                                <?php
                                                
                                                $l_gv =$left_over[0]->gv;
                                                $l_fat =$left_over[0]->fat;
                                                $l_lr =$left_over[0]->lr;
                                                $l_snf =$left_over[0]->snf;
                                                $l_per =$left_over[0]->percentage;
                                                $l_ts =$left_over[0]->ts;
                                                $l_temp =$left_over[0]->temperature;
                                            
                                                ?>
                                                <tr>
                                                    <th colspan="4">LEFT OVER</th>
                                                    <th>{{num_format($l_gv)}}</th>
                                                    <th>{{num_format($l_fat)}}</th>
                                                    <th>{{num_format($l_lr)}}</th>
                                                    <th>{{num_format($l_snf)}}</th>
                                                    <th>{{num_format($l_per)}}</th>
                                                    <th>{{num_format($l_ts)}}</th>
                                                    <th>{{num_format($l_temp)}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">TOTAL</th>
                                                    <th>{{num_format($gv +=$l_gv)}}</th>
                                                    <th>{{num_format(($gv>0)?($fat+($l_fat*$l_gv))/$gv:0)}}</th>
                                                    <th>{{num_format(($gv>0)?($lr+($l_lr*$l_gv))/$gv:0)}}</th>
                                                    <th>{{num_format(($gv>0)?($snf+($l_snf*$l_gv))/$gv:0)}}</th>
                                                    <th>{{num_format(($gv>0)?($percentage+$l_per):0)}}</th>
                                                    <th>{{num_format(($gv>0)?($ts+$l_ts):0)}}</th>
                                                    <th>{{num_format(($gv>0)?($temperature+($l_temp*$l_gv))/$gv:0)}}</th>
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

</script>

@endsection
