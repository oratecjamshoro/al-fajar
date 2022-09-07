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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                            <li class="breadcrumb-item active">Add</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Employee</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-box">
                                    
                                    <form action="{{Route('employees.store')}}" method="post" class="parsley-examples" novalidate="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Employee Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="emp_name" parsley-trigger="change" required
                                                        placeholder="Enter Employee Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Father's Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="father_name" parsley-trigger="change" required
                                                        placeholder="Enter Father's Name" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>CNIC<span class="text-danger">*</span></label>
                                                    <input type="text" name="emp_cnic" data-toggle="input-mask" data-mask-format="00000-0000000-0" parsley-trigger="change" required
                                                        placeholder="Enter CNIC" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone<span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" parsley-trigger="change" required
                                                        placeholder="Enter Phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Employee Type<span class="text-danger">*</span></label>
                                                    {!! Form::select('emp_type', $employee_type, null, ['class' => 'form-control','data-toggle'=>'select2']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Designation<span class="text-danger">*</span></label>
                                                    <input type="text" name="emp_designation" parsley-trigger="change" required
                                                        placeholder="Enter Designation" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Employee Sallary<span class="text-danger">*</span></label>
                                                    <input type="text" name="emp_sallary" parsley-trigger="change" required
                                                        placeholder="Enter Sallary" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Employee Pic<span class="text-danger">*</span></label>
                                                    <input type="file" name="emp_pic" parsley-trigger="change" required
                                                        placeholder="Enter Phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Cancel
                                            </button>
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

@endsection