<?php

header("Content-Type: application/json");

// Allow only DELETE method
if($_SERVER['REQUEST_METHOD'] != 'DELETE')
{
    http_response_code(405);

    echo json_encode([
        "status" => false,
        "message" => "Only DELETE method allowed"
    ]);

    exit;
}

// Get DELETE input
$data = json_decode(file_get_contents("php://input"), true);

$wishlist_id = $data['wishlist_id'] ?? null;

// Validate input
if(!$wishlist_id)
{
    http_response_code(400);

    echo json_encode([
        "status" => false,
        "message" => "wishlist_id is required"
    ]);

    exit;
}

/*
Simulate deletion (no database used)
Normally you would run SQL like:
DELETE FROM wishlist WHERE id = $wishlist_id;
*/

echo json_encode([
    "status" => true,
    "message" => "Wishlist item deleted successfully",
    "wishlist_id" => $wishlist_id
]);

?>