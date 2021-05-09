@extends('hotels.layout')
  
@section('content')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Check the Rate</h2>
        </div>
        <div class="pull-right">
                @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('rate.search')}}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-9">
                <strong>Check In:</strong>
                </div>
                <div class="col-md-6">
                <input type="text" id='start_date' name="check_in" class="form-control" placeholder="Date" readonly>
                </div>
                <div class="col-md-9">
                <strong>Check In:</strong>
                </div>
                <div class="col-md-6">
                <input type="text" id='end_date' name="check_out" class="form-control" placeholder="Date" readonly>
                </div>
                
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-9">
                <strong>How many Adult:</strong>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="adult">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-9">
                <strong>How Many Child:</strong>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="child">
                </div>
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
<script>
$("#start_date").datepicker({    
    endDate: new Date(),     
    autoclose: true, 
    format: 'dd-mm-yyyy',
    todayHighlight: true
}).on('changeDate', function (selected) {
    var minDate = new Date(selected.date.valueOf());
    $('#end_date').datepicker('setStartDate', minDate);
});

$("#end_date").datepicker({ 
    startDate: $("#start_date").val(),
    format: 'dd-mm-yyyy',
    autoclose: true, 
    todayHighlight: true
}).on('changeDate', function (selected) {
    var maxDate = new Date(selected.date.valueOf());
    $('#start_date').datepicker('setEndDate', maxDate);
});
</script>
@endsection