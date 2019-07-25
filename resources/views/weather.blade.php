<h1>Weather Forecast <span class="text-muted">|</span> {{($geoIParr['city'].', '.$geoIParr['state'])}}</h1>


{{--{{dd($geoIParr)}}--}}


{{--{{dd($forecastData)}}--}}

    @foreach($forecastData['list'] as $forecast)

        <h2>{{date('l F dS Y gA',strtotime($forecast['dt_txt'])) }}</h2>


    @foreach($forecast['weather'] as  $weather )

       {{--{{dd($weather)}}--}}

      <p><img src="http://openweathermap.org/img/wn/{{$weather['icon']}}@2x.png" title="{{$weather['main']}}" alt="{{$weather['main']}}"></p>

      <p>{{ucwords($weather['description'])}}</p>


    @endforeach

    <p>Temp: {{$forecast['main']['temp']}}&#8457;</p>
    <p>Min Temp: {{$forecast['main']['temp_min']}}&#8457;  Max Temp:  {{$forecast['main']['temp_max']}}&#8457;</p>
    <p>Pressure:  {{$forecast['main']['pressure']}}</p>
    <p>Sea Level:  {{$forecast['main']['sea_level']}}</p>
    <p>Ground Level:  {{$forecast['main']['grnd_level']}}</p>
    <p>Humidity:  {{$forecast['main']['humidity']}}</p>
    <p>Temp Kf:  {{$forecast['main']['temp_kf']}}</p>

        <br/>
        <hr/>

    @endforeach