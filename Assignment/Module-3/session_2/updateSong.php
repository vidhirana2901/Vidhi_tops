<?php

header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "", "music_db");

if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    // Read JSON data from PUT request
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'];
    $title = $data['title'];
    $duration = $data['duration'];

    $query = "UPDATE songs 
              SET title='$title', duration='$duration' 
              WHERE id='$id'";

    if(mysqli_query($conn, $query))
    {
        echo json_encode([
            "message" => "Song Updated Successfully"
        ]);
    }
    else
    {
        echo json_encode([
            "message" => "Update Failed"
        ]);
    }
}
else
{
    echo json_encode([
        "message" => "Only PUT Method Allowed"
    ]);
}

?>