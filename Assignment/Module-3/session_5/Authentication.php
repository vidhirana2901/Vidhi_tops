<?php

header("Content-Type: application/json");

$username = "musicfan";
$password = "topstraining";

if (
    !isset($_SERVER['PHP_AUTH_USER']) ||
    !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] != $username ||
    $_SERVER['PHP_AUTH_PW'] != $password
)
{
    header('WWW-Authenticate: Basic realm="Playlist API"');
    http_response_code(401);

    echo json_encode([
        "message" => "Unauthorized"
    ]);

    exit;
}

$playlists = [
    [
        "id" => 1,
        "name" => "Top Hits"
    ],
    [
        "id" => 2,
        "name" => "Workout Mix"
    ],
    [
        "id" => 3,
        "name" => "Chill Vibes"
    ]
];

echo json_encode($playlists);

?>