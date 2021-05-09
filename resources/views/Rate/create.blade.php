@extends('hotels.layout')
  
@section('content')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            @if(@$rate->id != null)
            <h2>Update Rate</h2>
            @else
            <h2>Add New Rate</h2>
            @endif
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('rate.index',['id'=>@$hotelId]) }}"> Back</a>
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
   
<form action="{{ route('rate.store') }}" method="POST">
    @csrf
    <input hidden name='hotel_id' value="{{@$hotelId}}">
    <input hidden name='id' value="{{@$rate->id}}">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Date Range:</strong>
                </div>
                <div class="col-md-3">
                <input type="text" id='start_date' name="check_in" class="form-control" placeholder="Date" readonly value="{{@$rate->check_in_date}}">
                </div>
                <div class="col-md-3">
                <input type="text" id='end_date' name="check_out" class="form-control" placeholder="Date" readonly value="{{@$rate->check_out_date}}">
                </div>
                
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Price For Adult:</strong>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="price_adult" value="{{@$rate->price_adult}}">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Price For Child:</strong>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="price_child"  value="{{@$rate->price_child}}">
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