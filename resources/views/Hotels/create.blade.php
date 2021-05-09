@extends('hotels.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Hotel</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Back</a>
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
   
<form action="{{ route('hotels.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hotel Name:</strong>
                <input type="text" name="hotel_name" class="form-control" placeholder="Name">
            </div>
        </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
<!--
                <strong>Hotel Star:</strong>
                <input type="text" name="hotel_star" class="form-control" placeholder="Star">
-->
                <select type="text" name="hotel_star" class="form-control">
                        <option>Select Star</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>                 
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea class="form-control" style="height:150px" name="address" placeholder="Hotel Address"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection