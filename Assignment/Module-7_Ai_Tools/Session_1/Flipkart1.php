<?php

function searchProducts($products, $keyword)
{
    $result = [];

    foreach ($products as $product) {
        if (stripos($product, $keyword) !== false) {
            $result[] = $product;
        }
    }

    return $result;
}

$products = ["iPhone 15", "Samsung Galaxy", "HP Laptop", "Dell Laptop"];

print_r(searchProducts($products, "Laptop"));
?>