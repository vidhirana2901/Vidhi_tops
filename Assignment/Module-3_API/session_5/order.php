<?php

header("Content-Type: application/json");

$api_key = "MYSECRET123";

// Check API Key
if(!isset($_GET['api_key']) || $_GET['api_key'] != $api_key)
{
    header("HTTP/1.1 401 Unauthorized");

    echo json_encode([
        "status" => false,
        "message" => "Invalid API Key"
    ]);

    exit;
}

// Mock Orders
$orders = [
    [
        "id" => 1,
        "food" => "Pizza",
        "price" => 299
    ],
    [
        "id" => 2,
        "food" => "Burger",
        "price" => 149
    ],
    [
        "id" => 3,
        "food" => "Pasta",
        "price" => 199
    ]
];

echo json_encode($orders);

?>