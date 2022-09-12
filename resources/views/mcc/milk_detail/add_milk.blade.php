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
                                    <h4 class="page-title">Add Milk</h4>
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

                                    <div class="row mb-5">
                                        <div class="col-md-3">
                                            <img src="{{asset($supplier->image)}}" class="d-flex mr-3 rounded-circle" height="100" width="100">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    Name
                                                </div>
                                                <div class="col-md-9">
                                                    {{$supplier->name}}
                                                </div>
                                                <div class="col-md-3">
                                                    Contact
                                                </div>
                                                <div class="col-md-9">
                                                    {{$supplier->contact}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{Route('milk_detail.store',$supplier->id)}}" method="post" enctype="multipart/form-data" class="parsley-examples" novalidate="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tarif Chanal<span class="text-danger">*</span></label>
                                                    <input type="text" name="tarif_chanal" parsley-trigger="change" required
                                                        placeholder="Enter Name" class="form-control">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Shift<span class="text-danger">*</span></label>
                                                    {!! Form::select('shift',['Morning'=>'Morning','Evening'=>'Evening'], null, ['class' => 'form-control','data-toggle'=>'select2']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>G.V<span class="text-danger">*</span></label>
                                                    <input type="text" name="gv" parsley-trigger="change" required
                                                        placeholder="Enter G.V" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>FAT<span class="text-danger">*</span></label>
                                                    <input type="text" name="fat" parsley-trigger="change" required
                                                        placeholder="Enter FAT" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>L.R<span class="text-danger">*</span></label>
                                                    <input type="text" name="lr" parsley-trigger="change" required
                                                        placeholder="Enter L.R" class="form-control">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>SNF<span class="text-danger">*</span></label>
                                                    <input type="text" name="snf" parsley-trigger="change" required
                                                        placeholder="Enter SNF" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>6%<span class="text-danger">*</span></label>
                                                    <input type="text" name="percentage" parsley-trigger="change" required
                                                        placeholder="Enter 6%" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>T.S<span class="text-danger">*</span></label>
                                                    <input type="text" name="ts" parsley-trigger="change" required
                                                        placeholder="Enter T.S" class="form-control">
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