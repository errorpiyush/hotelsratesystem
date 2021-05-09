
@extends('hotels.layout')
@section('content')
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Name:</strong>
                </div>
                <div class='col-md-6'>
                {{ @$hotel->hotel_name }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Hotel Star:</strong>
                </div>
                <div class='col-md-6'>
                {{ @$hotel->hotel_star }}
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Address:</strong>
                </div>
                <div class='col-md-6'>
                {{ @$hotel->address }}
                </div>
            </div>
        </div>
    </div>
@endsection