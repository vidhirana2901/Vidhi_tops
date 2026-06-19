<?php

$url = "http://localhost/getTopSongs.php?genre=pop";

// Call API
$response = @file_get_contents($url);

// Get HTTP Status Code
$statusCode = 0;

if(isset($http_response_header[0]))
{
    preg_match('/\d{3}/', $http_response_header[0], $matches);
    $statusCode = $matches[0];
}

// Handle Responses
switch($statusCode)
{
    case 200:
        echo "<h3>Top Songs</h3>";
        $songs = json_decode($response, true);

        foreach($songs as $song)
        {
            echo $song . "<br>";
        }
        break;

    case 400:
        echo "Error: Genre parameter is required.";
        break;

    case 403:
        echo "Error: Please use HTTPS connection.";
        break;

    case 429:
        echo "Error: Too many requests. Try again later.";
        break;

    default:
        echo "Error: Unable to connect to API.";
}
?>