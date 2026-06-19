<?php

header("Content-Type: application/json");

$movies = [
    [
        "id" => 1,
        "title" => "Avatar",
        "genre" => "Sci-Fi"
    ],
    [
        "id" => 2,
        "title" => "Titanic",
        "genre" => "Romance"
    ]
];

echo json_encode([
    "status" => true,
    "message" => "Movies Fetched Successfully",
    "data" => $movies
]);

?>