<?php

header("Content-Type: application/json");

// Check genre parameter
if(!isset($_GET['genre']) || empty($_GET['genre']))
{
    http_response_code(400);

    echo json_encode([
        "error" => "Genre parameter is required"
    ]);

    exit;
}

$songs = [
    "Shape of You",
    "Blinding Lights",
    "Perfect",
    "Levitating",
    "Calm Down"
];

echo json_encode($songs);

?>