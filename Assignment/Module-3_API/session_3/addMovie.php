<?php

header("Content-Type: application/json");

$movie = json_decode(file_get_contents("php://input"), true);

echo json_encode([
    "status" => true,
    "message" => "Movie Added Successfully",
    "data" => $movie
]);

?>