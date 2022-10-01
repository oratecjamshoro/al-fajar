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
                                            ?>
                                            @foreach($received_milk as $val)
                                            <?php
                                                $gv +=$val->gv;
                                                $fat +=$val->fat;
                                                $lr +=$val->lr;
                                                $snf +=$val->snf;
                                                $percentage +=$val->percentage;
                                                $ts +=$val->ts;
                                            ?>
                                                <tr>
                                                    <td>{{$val->id}}</td>
                                                    <td>{{$val->tarif_chanal}}</td>
                                                    <td>{{$val->shift}}</td>
                                                    <td>{{$val->supplierdata->name}}</td>
                                                    <td>{{$val->gv}}</td>
                                                    <td>{{$val->fat}}</td>
                                                    <td>{{$val->lr}}</td>
                                                    <td>{{round($val->snf,2)}}</td>
                                                    <td>{{round($val->percentage,2)}}</td>
                                                    <td>{{round($val->ts,2)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                <div id="shift" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Modal Content is Responsive</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary shift" value="Morning">Morning</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info shift" value="Evening">Evening</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div><!-- /.modal -->

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

@endsection

