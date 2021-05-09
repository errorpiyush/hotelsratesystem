<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRate extends Model
{
    protected $fillable = [
        'hotel_id', 'price_adult','price_child','check_in','check_out'
    ];
    
    public function getDateRangeAttribute(){
        $dateIn = date('jS F',strtotime($this->check_in));
        $dateOut = date('jS F',strtotime($this->check_out));
        return $dateIn.' to '.$dateOut;
    } 
    
    public function getCheckInDateAttribute(){
        return date('d-m-Y',strtotime($this->check_in));
    }
    
    public function getCheckOutDateAttribute(){
        return date('d-m-Y',strtotime($this->check_out));
    }
    
    public function hotel(){
        return $this->belongsTo('App\Hotel','hotel_id');
    }
}
