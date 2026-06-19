<?php

header("Content-Type: application/json");

// Check for fail=true
if(isset($_GET['fail']) && $_GET['fail'] == 'true')
{
    http_response_code(404);

    echo json_encode([
        "error" => "Movies not found"
    ]);

    exit;
}

$movies = array(
    array("id"=>1, "title"=>"Avatar", "genre"=>"Sci-Fi"),
    array("id"=>2, "title"=>"Titanic", "genre"=>"Romance"),
    array("id"=>3, "title"=>"Inception", "genre"=>"Action"),
    array("id"=>4, "title"=>"The Dark Knight", "genre"=>"Action"),
    array("id"=>5, "title"=>"Frozen", "genre"=>"Animation")
);

echo json_encode($movies);

?>