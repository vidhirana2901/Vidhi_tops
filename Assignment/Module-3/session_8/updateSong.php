<?php

header("Content-Type: application/json");

// Check HTTPS
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
{
    http_response_code(403);

    echo json_encode([
        "error" => "HTTPS is required"
    ]);

    exit;
}

// Check genre parameter
if (!isset($_GET['genre']) || empty($_GET['genre']))
{
    http_response_code(400);

    echo json_encode([
        "error" => "Genre parameter is required"
    ]);

    exit;
}

// Top songs
$songs = [
    "Shape of You",
    "Blinding Lights",
    "Perfect",
    "Levitating",
    "Calm Down"
];

echo json_encode($songs);

?>