<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::latest()->paginate(5);
  
        return view('hotels.index',['hotels'=>@$hotels])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'hotel_name' => 'required',
            'hotel_star' => 'required'
        ]);
  
        Hotel::updateOrCreate(['id'=>$request->id],$request->all());
   
        return redirect()->route('hotels.index')
                        ->with('success','Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        $hotel = Hotel::find($id);
        return view('hotels.show',['hotel'=>@$hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $hotel = Hotel::find($id);
        return view('hotels.edit',['hotel'=>@$hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
        $request->validate([
            'hotel_name' => 'required',
            'hotel_star' => 'required',
            'hotel_star' => '',
        ]);
  
        $hotel->update($request->all());
  
        return redirect()->route('hotels.index')
                        ->with('success','Hotels updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
  
        return redirect()->route('hotels.index')
                        ->with('success','Hotel deleted successfully');
    }
}
