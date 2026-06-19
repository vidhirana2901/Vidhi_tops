<?php

$conn = mysqli_connect("localhost", "root", "", "music_db");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $duration = $_POST['duration'];

    $query = "INSERT INTO songs(title, artist, duration)
              VALUES('$title', '$artist', '$duration')";

    if(mysqli_query($conn, $query))
    {
        echo "Song Added Successfully";
    }
    else
    {
        echo "Error";
    }
}
else
{
    echo "Only POST Request Allowed";
}

?>