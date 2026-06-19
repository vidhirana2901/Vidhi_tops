<?php

header("Content-Type: application/json");

$tracks = [
    [
        "id" => 1,
        "name" => "Shape of You",
        "artist" => "Ed Sheeran",
        "duration" => "3:54"
    ],
    [
        "id" => 2,
        "name" => "Blinding Lights",
        "artist" => "The Weeknd",
        "duration" => "3:20"
    ],
    [
        "id" => 3,
        "name" => "Perfect",
        "artist" => "Ed Sheeran",
        "duration" => "4:23"
    ],
    [
        "id" => 4,
        "name" => "Levitating",
        "artist" => "Dua Lipa",
        "duration" => "3:24"
    ],
    [
        "id" => 5,
        "name" => "Calm Down",
        "artist" => "Rema",
        "duration" => "3:39"
    ]
];

echo json_encode($tracks);

?>