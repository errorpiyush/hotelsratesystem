<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hotels')->insert([
            'hotel_name'=>Str::random(10),
            'hotel_star'=>Str::random(10),
            'address'=>Str::random(10)
        ]);
    }
}
