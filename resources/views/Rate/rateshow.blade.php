
@extends('hotels.layout')
@section('content')
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Rate Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('welcome') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row mt-2">
        <table class="table">
        <thead>
            <tr>
                <td>Hotel Name</td>
                <td>From Date</td>
                <td>To Date</td>
                <td>Total Adult Price</td>
                <td>Total Child Price</td>
                <td>Total Price</td>
            </tr>
        </thead>
            <tbody>
                @forelse($result as $key => $value)
                <tr>
                    <td>{{ @$value['hotel_name'] }}</td>
                    <td>{{ @$value['from_date'] }}</td>
                    <td>{{ @$value['to_date'] }}</td>
                    <td>{{ @$value['adult_price'] }}</td>
                    <td>{{ @$value['child_price'] }}</td> 
                    <td>{{ @$value['total'] }}</td>
                </tr>
                @empty
                <tr>
                    <td>No Record Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection