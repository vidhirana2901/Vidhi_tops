<?php

session_start();

header("Content-Type: application/json");

// Only allow POST requests
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    http_response_code(405);

    echo json_encode([
        "status" => false,
        "message" => "Only POST method allowed"
    ]);

    exit;
}

// Get POST data
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Validation
if(empty($product_id) || empty($quantity))
{
    http_response_code(400);

    echo json_encode([
        "status" => false,
        "message" => "product_id and quantity are required"
    ]);

    exit;
}

// Create cart session if not exists
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = [];
}

// Add product to cart
$_SESSION['cart'][] = [
    "product_id" => $product_id,
    "quantity" => $quantity
];

// Success response
echo json_encode([
    "status" => true,
    "message" => "Product added to cart successfully",
    "cart" => $_SESSION['cart']
]);

?>