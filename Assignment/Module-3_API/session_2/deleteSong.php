<?php

header("Content-Type: application/json");

$conn = mysqli_connect("localhost","root","","music_db");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$query = "DELETE FROM songs WHERE id='$id'";

if(mysqli_query($conn,$query))
{
    echo json_encode([
        "status" => true,
        "message" => "Song Deleted Successfully"
    ]);
}
else
{
    echo json_encode([
        "status" => false,
        "message" => "Delete Failed"
    ]);
}

?>