<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::post('/search','RateController@search')->name('rate.search');
//Route::resource('hotels','HotelController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']],function () {
    Route::group(['prefix' => 'hotels'], function () {
        Route::get('/','HotelController@index')->name('hotels.index');    Route::get('/create','HotelController@create')->name('hotels.create');   
        Route::match(['post', 'PUT'], 'store', [ 'uses' => 'HotelController@store'])->name('hotels.store');
        Route::get('/layout','HotelController@index')->name('hotels.layout');    Route::get('/edit/{id?}','HotelController@edit')->name('hotels.edit');
        Route::get('/show/{id?}','HotelController@show')->name('hotels.show');
        Route::delete('/destroy/{id?}','HotelController@destroy')->name('hotels.destroy');

    });
    
        Route::group(['prefix' => 'rate'], function () {
        Route::get('/{id?}','RateController@index')->name('rate.index');    Route::get('/create/{id?}','RateController@create')->name('rate.create');   
        Route::match(['post', 'PUT'], 'store', [ 'uses' => 'RateController@store'])->name('rate.store');
            Route::get('/edit/{id?}','RateController@edit')->name('rate.edit'); 
        Route::get('/layout','RateController@index')->name('rate.layout');  
//            Route::get('/edit/{id?}','RateController@create')->name('rate.edit');
        Route::get('/show/{id?}','RateController@show')->name('rate.show');
        Route::delete('/destroy/{id?}','RateController@destroy')->name('rate.destroy');

    });
});
