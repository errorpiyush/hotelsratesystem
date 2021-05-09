@extends('hotels.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb mt-2">
            <div class="pull-left">
                <h2>Hotel Rate System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hotels.create') }}"> Create New Hotel</a>
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
            <th>No</th>
            <th>Hotel Name</th>
            <th>Hotel Star</th>
            <th>Hotel Address</th>
            <th width="280px">Action</th>
        </tr>
        @forelse ($hotels as $key => $hotel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $hotel->hotel_name }}</td>
            <td>{{ $hotel->hotel_star }}</td>
            <td>{{ $hotel->address }}</td>
            <td>
                <form action="{{ route('hotels.destroy',['id'=>$hotel->id]) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('hotels.show',['id'=>@$hotel->id]) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('hotels.edit',['id'=>@$hotel->id]) }}">Edit</a>
                    
                    <a class="btn btn-primary" href="{{ route('rate.index',['id'=>@$hotel->id]) }}">Rate</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        @endforelse
    </table>
  
    {!! $hotels->links() !!}
      
@endsection