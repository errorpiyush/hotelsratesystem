@extends('hotels.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit hotel</h2>
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
  

        @if(isset($hotel) || !empty($hotel))
            <form method = 'POST' action = '{{route('hotels.store')}}' >
            @method('PUT')
        @else
            <form method = 'POST' action = '{{route('hotels.store')}}' >
        @endif
        @csrf
        <input hidden name='id' value="{{@$hotel->id}}">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hotel Name:</strong>
                    <input type="text" name="hotel_name" value="{{ $hotel->hotel_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hotel Star:</strong>
                    <select type="text" name="hotel_star" class="form-control">
                        <option>Select Star</option>
                        <option value="3" {{($hotel->hotel_star == 3) ? 'selected':''}}>3</option>
                        <option value="4" {{($hotel->hotel_star == 4) ? 'selected':''}}>4</option>
                        <option value="5" {{($hotel->hotel_star == 5) ? 'selected':''}}>5</option>
                        <option value="7" {{($hotel->hotel_star == 7) ? 'selected':''}}>7</option>                 
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address">{{ $hotel->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection