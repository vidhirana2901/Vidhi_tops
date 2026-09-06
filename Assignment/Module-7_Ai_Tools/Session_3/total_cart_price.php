<?php

// function to calculate total cart price with 5% delivery charge
function calculateTotalCartPrice(array $items): float
{
    $subtotal = 0.0;

    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    return $subtotal * 1.05;
}

$sampleCart = [
    ['name' => 'Veg Biryani', 'price' => 180, 'quantity' => 2],
    ['name' => 'Masala Dosa', 'price' => 120, 'quantity' => 1],
];

$totalPrice = calculateTotalCartPrice($sampleCart);

echo 'Total cart price: Rs. ' . number_format($totalPrice, 2) . PHP_EOL;
