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
                                            <li class="breadcrumb-item active">Today List</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Add Milk
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="change_shift">
                                                    <option value="">Select Shift</option>
                                                    <option>Morning</option>
                                                    <option>Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>Contact</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $a=1; ?>
                                            @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{$a++}}</td>
                                                <td><img src="{{asset($supplier->image)}}" class="d-flex mr-3 rounded-circle" height="64" width="64"></td>
                                                <td>{{$supplier->name}}</td>
                                                <td>{{$supplier->father_name}}</td>
                                                <td>{{$supplier->contact}}</td>
                                                <td>{{$supplier->status}}</td>
                                                <td>
                                                    <a class="btn btn-success btn-xs" href="{{ route('milk_detail.show',$supplier->id) }}">
                                                        Add Milk
                                                    </a>

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


<script>

    $('#change_shift').change(function(){
        var shift = $(this).val();

        Swal.fire({
            title:"Are you sure?",
            text:"You want to change shift!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#3085d6",
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, change it!"
        }).then(function(t)
        {
            if(t.value)
            {
                if(shift)
                {
                    localStorage.shift = shift;
                    document.cookie = "shift="+shift;
                    Swal.fire("Shift!","Your shift has been changed.","success")
                }
                else
                {
                    localStorage.clear();
                    Swal.fire("Sorry!","Select your shift!.","warning")
                }
            }
            else
            {
                $("#change_shift").val(localStorage.shift);
            }
            
        })   
    })

    if(localStorage.shift)
    {
        $("#change_shift").val(localStorage.shift);
    }
</script>
@endsection

