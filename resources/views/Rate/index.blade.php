@extends('rate.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb mt-2">
            <div class="pull-left">
                <h2>Hotel Rate System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rate.create',['id'=>@$hotelId]) }}"> New Rate</a>
                <a class="btn btn-success" href="{{ route('hotels.index') }}">Go To Hotel</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Date Range</th>
            <th>Rate For Adult </th>
            <th>Rate For Child </th>
            <th width="280px">Action</th>
        </tr>
        @forelse ($hotelRates as $key => $rate)
        <tr>
            <td>{{ @$rate->date_range }}</td>
            <td>{{ @$rate->price_adult }}</td>
            <td>{{ @$rate->price_child }}</td>
            <td>
                <form action="{{ route('rate.destroy',['id'=>$rate->id]) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('rate.show',['id'=>@$rate->id]) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('rate.edit',['id'=>@$rate->id]) }}">Edit</a>
                   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4">No Record Found !</td></tr>
        @endforelse
    </table>
  
    {!! $hotelRates->links() !!}
      
@endsection