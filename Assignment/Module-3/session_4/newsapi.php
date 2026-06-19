<?php

$apiKey = "YOUR_API_KEY";

$url = "https://newsapi.org/v2/top-headlines?country=in&apiKey=".$apiKey;

$response = file_get_contents($url);

$data = json_decode($response, true);

echo "<h2>Top 5 News Headlines</h2>";

for($i = 0; $i < 5; $i++)
{
    echo ($i + 1) . ". " . $data['articles'][$i]['title'] . "<br><br>";
}

?>