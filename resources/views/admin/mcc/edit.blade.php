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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">MCC</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">MCC Edit</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-box">
                                    {!! Form::model($mcc, ['method' => 'PATCH','route' => ['mcc.update', $mcc->id]]) !!}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>MCC Branch Name<span class="text-danger">*</span></label>
                                                    {!! Form::text('branch_name', null, array('placeholder' => 'Enter Branch Name','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Branch Code<span class="text-danger">*</span></label>
                                                    {!! Form::text('branch_code', null, array('placeholder' => 'Enter Branch Code','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address<span class="text-danger">*</span></label>
                                                    {!! Form::text('address', null, array('placeholder' => 'Enter Address','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone<span class="text-danger">*</span></label>
                                                    {!! Form::text('phone', null, array('placeholder' => 'Enter Phone','class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>MCCI<span class="text-danger">*</span></label>
                                                    {!! Form::select('mcci_id', $mcci, $mcc->mcci_id, ['class' => 'form-control','data-toggle'=>'select2']) !!}
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

                                    {!! Form::close() !!}
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