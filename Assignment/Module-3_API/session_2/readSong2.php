<?php

header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "", "music_db");

if (!$conn)
{
    http_response_code(500);

    echo json_encode([
        "status" => false,
        "message" => "Database Connection Failed"
    ]);

    exit;
}

$query = "SELECT * FROM songs";
$result = mysqli_query($conn, $query);

$data = array();

while($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

echo json_encode($data);

?>