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

                                    <form action="{{Route('milk_detail.store')}}" method="post" enctype="multipart/form-data" class="parsley-examples" novalidate="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tarif Chanal<span class="text-danger">*</span></label>
                                                    {!! Form::select('tarif_chanal',[''=>'Select Tarif Chanal','buffalo'=>'Buffalo','cow'=>'Cow'], null, ['class' => 'form-control cal','data-toggle'=>'select2','id'=>'tarif']) !!}
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>G.V<span class="text-danger">*</span></label>
                                                    <input type="text" name="gv" id="gv" parsley-trigger="change" required
                                                        placeholder="Enter G.V" class="form-control cal">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>FAT<span class="text-danger">*</span></label>
                                                    <input type="text" name="fat" id="fat" parsley-trigger="change" required
                                                        placeholder="Enter FAT" class="form-control cal">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>L.R<span class="text-danger">*</span></label>
                                                    <input type="text" name="lr" id="lr" parsley-trigger="change" required
                                                        placeholder="Enter L.R" class="form-control cal">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>SNF<span class="text-danger">*</span></label>
                                                    <input type="text" id="snf-tem" parsley-trigger="change" required
                                                        placeholder="Enter SNF" class="form-control cal" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>6%<span class="text-danger">*</span></label>
                                                    <input type="text" id="percentage-tem" parsley-trigger="change" 
                                                        placeholder="Enter 6%" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>T.S<span class="text-danger">*</span></label>
                                                    <input type="text" id="ts-tem" parsley-trigger="change" 
                                                        placeholder="Enter T.S" class="form-control" readonly>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Temperature</label>
                                                    <input type="text" name="temperature" parsley-trigger="change" required
                                                        placeholder="Enter Temperature" class="form-control">
                                                </div>
                                            </div>
                                        </div>    

                                        <input type="hidden" name="snf" id="snf">
                                        <input type="hidden" name="percentage" id="percentage">
                                        <input type="hidden" name="ts" id="ts">
                                        <input type="hidden" name="id" value="{{$supplier->id}}">
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

    //$('#ts').parent().parent().hide();
    //$('#percentage').parent().parent().hide();

    $('.cal').on('keyup change', function(e) {

        let tarif = $('#tarif').val();
        let gv = ($('#gv').val())?parseFloat($('#gv').val()):0.00;
        let fat = ($('#fat').val())?parseFloat($('#fat').val()):0.00;
        let lr = ($('#lr').val())?parseFloat($('#lr').val()):0.00;
        let snf = 0;

        if(lr >0)
        {
            snf = ((lr/4)+(fat*0.22+0.72));
        }
        
        $('#snf').val(snf);
        $('#percentage').val((gv*fat/6));
        $('#ts').val((fat+snf)*gv/13);

        $('#snf-tem').val((snf).toFixed(2));
        $('#percentage-tem').val((gv*fat/6).toFixed(2));
        $('#ts-tem').val(((fat+snf)*gv/13).toFixed(2));

        // if(tarif == 'buffalo')
        // {
        //     $('#percentage').parent().parent().show();
        //     $('#ts').val('');
        //     $('#percentage').val((gv*fat/6));
        //     $('#ts').parent().parent().hide();
        // }
        // else if(tarif == 'cow')
        // {
        //     $('#ts').parent().parent().show();
        //     $('#percentage').val('');
        //     $('#ts').val(((fat+snf)*gv/13).toFixed(2));
        //     $('#percentage').parent().parent().hide();
        // }

    });
    
</script>

@endsection