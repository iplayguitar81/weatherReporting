<?php

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Cache;

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


//vue route...
Route::get('/', function () {

    return view('weather-vue');});

//laravel route...
Route::get('/weather', ['as' => 'weather', 'uses' => 'WeatherController@forecast']);

