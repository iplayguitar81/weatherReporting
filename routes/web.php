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

Route::get('/', function () {

    //gather user's ip address...
    $userIP = request()->ip();

    //get location based on ip address (geoIP package)...
    $geoIParr = geoip()->getLocation($userIP);


    $userCity = $geoIParr['city'];
    $userState = $geoIParr['state'];

    $userLatitude = $geoIParr['lat'];
    $userLongitude = $geoIParr['lon'];


    //add to ENV file...
    $ACCESS_TOKEN = env('OPEN_WEATHER_API_KEY');



      //instantiate Guzzle client...

    $client = new Client();


    //pass in city & state based on IP?

    $url = 'api.openweathermap.org/data/2.5/forecast?lat='.$userLatitude.'&lon='.$userLongitude.'&units=imperial&APPID='.$ACCESS_TOKEN.'';

    $response = $client->request('GET', $url);

    //$forecastData = $response->getBody()->getContents();

    $forecastData = json_decode($response->getBody(), true);


  //  $forecastData = json_decode($forecastData, true);

    //$forecastData = json_encode($forecastData);





    return view('weather', compact('geoIParr', 'userIP', 'forecastData'));
});



Route::get('/weather', ['as' => 'weather', 'uses' => 'WeatherController@forecast']);
