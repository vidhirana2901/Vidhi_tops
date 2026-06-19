<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$order_id = $data['order_id'];

$order = [
    "order_id" => $order_id,
    "status" => "Delivered"
];

echo json_encode($order);

?>