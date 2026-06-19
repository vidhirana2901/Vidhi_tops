<?php

$apiKey = "YOUR_API_KEY";
$city = "Ahmedabad";

$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

$response = @file_get_contents($url);

if(!$response)
{
    echo "Weather data not available.";
}
else
{
    $data = json_decode($response, true);

    if(isset($data['main']['temp']))
    {
        echo "City: ".$city."<br>";
        echo "Temperature: ".$data['main']['temp']." °C";
    }
    else
    {
        echo "Invalid weather data.";
    }
}

?>