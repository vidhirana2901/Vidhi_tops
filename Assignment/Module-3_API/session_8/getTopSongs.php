<?php

header("Content-Type: application/json");

$songs = [
    "Shape of You",
    "Blinding Lights",
    "Perfect",
    "Levitating",
    "Calm Down"
];

echo json_encode($songs);

?>