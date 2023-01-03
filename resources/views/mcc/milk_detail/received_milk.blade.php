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
                                                    <td>{{round($val->gv,2)}}</td>
                                                    <td>{{round($val->fat,2)}}</td>
                                                    <td>{{round($val->lr,2)}}</td>
                                                    <td>{{round($val->snf,2)}}</td>
                                                    <td>{{round($val->percentage,2)}}</td>
                                                    <td>{{round($val->ts,2)}}</td>
                                                    <td>{{$val->temperature}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">TOTAL</th>
                                                    <th>{{round($gv,2)}}</th>
                                                    <th>{{($gv>0)?round($fat/$gv,2):0}}</th>
                                                    <th>{{($gv>0)?round($lr/$gv,2):0}}</th>
                                                    <th>{{($gv>0)?round($snf/$gv,2):0}}</th>
                                                    <th>{{($gv>0)?round($percentage,2):0}}</th>
                                                    <th>{{($gv>0)?round($ts,2):0}}</th>
                                                    <th>{{($gv>0)?round($temperature/$gv,2):0}}</th>
                                                </tr>
                                                <?php
                                                $l_gv=0;
                                                $l_fat=0;
                                                $l_lr=0;
                                                $l_snf=0;
                                                $l_per=0;
                                                $l_ts=0;
                                                $l_temp=0;
                                                foreach ($left_over as $left)
                                                {
                                                    $l_gv +=$left->gv;
                                                    $l_fat +=$left->fat;
                                                    $l_lr +=$left->lr;
                                                    $l_snf +=$left->snf;
                                                    $l_per +=$left->percentage;
                                                    $l_ts +=$left->ts;
                                                    $l_temp +=$left->temperature;
                                                }
                                                ?>
                                                <tr>
                                                    <th colspan="4">LEFT OVER</th>
                                                    <th>{{round($l_gv,2)}}</th>
                                                    <th>{{round($l_fat,2)}}</th>
                                                    <th>{{round($l_lr,2)}}</th>
                                                    <th>{{round($l_snf,2)}}</th>
                                                    <th>{{round($l_per,2)}}</th>
                                                    <th>{{round($l_ts,2)}}</th>
                                                    <th>{{round($l_temp,2)}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">TOTAL</th>
                                                    <th>{{round($gv +=$l_gv,2)}}</th>
                                                    <th>{{($gv>0)?round(($fat+$l_fat)/$gv,2):0}}</th>
                                                    <th>{{($gv>0)?round(($lr+$l_lr)/$gv,2):0}}</th>
                                                    <th>{{($gv>0)?round(($snf+$l_snf)/$gv,2):0}}</th>
                                                    <th>{{($gv>0)?round(($percentage+$l_per),2):0}}</th>
                                                    <th>{{($gv>0)?round(($ts+$l_ts),2):0}}</th>
                                                    <th>{{($gv>0)?round(($temperature+$l_temp)/$gv,2):0}}</th>
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
