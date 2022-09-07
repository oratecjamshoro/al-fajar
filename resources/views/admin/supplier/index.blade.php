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
                                            <li class="breadcrumb-item active">Supplier</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Supplier</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                            <a href="{{ route('supplier.create') }}" class="btn btn-success mb-2">
                              <i class="fa fa-plus"></i> Add Supplier
                            </a>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>Contact</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{$supplier->id}}</td>
                                                <td>{{$supplier->name}}</td>
                                                <td>{{$supplier->father_name}}</td>
                                                <td>{{$supplier->contact}}</td>
                                                <td>{{$supplier->status}}</td>
                                                <td>
                                                    <a class="btn btn-success btn-xs" href="{{ route('supplier.show',$supplier->id) }}">
                                                        <i class="fas fa-check-square"></i>
                                                    </a>
                                                    <a class="btn btn-warning btn-xs" href="{{ route('supplier.edit',$supplier->id) }}">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                        {!! Form::open(['method' => 'DELETE','route' => ['supplier.destroy', $supplier->id],'style'=>'display:inline']) !!}
                                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}
                                                        {!! Form::close() !!}

                                                </td>
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