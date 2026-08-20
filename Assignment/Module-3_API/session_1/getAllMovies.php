<?php

header("Content-Type: application/json");

$movies = array(
    array(
        "id" => 1,
        "title" => "Avatar",
        "genre" => "Sci-Fi"
    ),
    array(
        "id" => 2,
        "title" => "Titanic",
        "genre" => "Romance"
    ),
    array(
        "id" => 3,
        "title" => "Inception",
        "genre" => "Action"
    ),
    array(
        "id" => 4,
        "title" => "The Dark Knight",
        "genre" => "Action"
    ),
    array(
        "id" => 5,
        "title" => "Frozen",
        "genre" => "Animation"
    )
);

echo json_encode($movies);

?>