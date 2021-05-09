<?php

namespace App\Http\Controllers;

use App\HotelRate;
use App\Hotel;
use DateTime;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotelId=null)
    {
        $hotelRates = HotelRate::whereHotelId($hotelId)->paginate(5);
  
        return view('rate.index',['hotelRates'=>@$hotelRates,'hotelId'=>@$hotelId])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
//        $rate = HotelRate::find($id);
        
        return view('rate.create',['hotelId'=>@$id]);
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $rate = HotelRate::find($id);
        
        return view('rate.create',['hotelId'=>@$rate->hotel_id,'rate'=>@$rate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'price_adult' => 'required',
            'price_child' => 'required',
            'check_in' => 'required',
            'check_out' => 'required'
        ]);
        $date_in = date('Y-m-d',strtotime($request->check_in));
        $date_out = date('Y-m-d',strtotime($request->check_out));
        
        $request['check_in'] = $date_in;
        $request['check_out'] = $date_out;
        HotelRate::updateOrCreate(['id'=>$request->id,'hotel_id'=>$request->hotel_id],$request->all());
        $msg = ($request->id == null)?'Hotel Rate created successfully.':'Hotel Rate updated successfully.';
        return redirect()->route('rate.index',['id'=>$request->hotel_id])
                        ->with('success',@$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        $hotelrate = HotelRate::find($id);
        return view('rate.show',['hotelrate'=>@$hotelrate]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        $hotelRate = HotelRate::find($id);
        $hotelRate->delete();
  
        return redirect()->route('rate.index',['id'=>$hotelRate->hotel_id])
                        ->with('success','Hotel Rate deleted successfully');
    }
    public function search(Request $request)
    {
        $request->validate([
            'adult' => 'required',
            'child' => 'required',
            'check_in' => 'required',
            'check_out' => 'required'
        ]);
        $date_in = date('Y-m-d',strtotime($request->check_in));
        $date_out = date('Y-m-d',strtotime($request->check_out));
        $searchData = HotelRate::whereDate('check_in','>=',$date_in)
                            ->whereDate('check_out','<=',$date_out)
                            ->get();
//        dd($request->all());
//        dd($searchData);
        $result = [];
        $earlier = new DateTime($date_in);
        $later = new DateTime($date_out);
        $diff = $later->diff($earlier)->format("%a");
        foreach($searchData as $key => $data){
            $result[$key]['hotel_name'] = @$data->hotel->hotel_name;
            $result[$key]['adult_price'] = (@$data->price_adult * $diff) * $request->adult;
            $result[$key]['child_price'] = (@$data->price_child * $diff) * $request->child;
            $result[$key]['total'] = $result[$key]['adult_price'] + $result[$key]['child_price'];
            $result[$key]['from_date'] = @$data->check_in_date;
            $result[$key]['to_date'] = @$data->check_out_date;
//        dd($searchData);

        }
            return view('rate.rateshow',['result'=>@$result]);
    }
}
