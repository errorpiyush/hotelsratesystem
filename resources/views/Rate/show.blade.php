
@extends('hotels.layout')
@section('content')
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Rate</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rate.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Date Range:</strong>
                </div>
                <div class='col-md-6'>
                {{ @$hotelrate->date_range }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Rate For Adult:</strong>
                </div>
                <div class='col-md-6'>
                {{ @$hotelrate->price_adult }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                <strong>Rate For Child:</strong>
                </div>
                <div class='col-md-6'>
                {{ @$hotelrate->price_child }}
                </div>
            </div>
        </div>

        </div>
    </div>
@endsection