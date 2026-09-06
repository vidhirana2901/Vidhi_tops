<?php

function searchProducts($products, $keyword)
{
    return array_filter($products, function ($product) use ($keyword) {
        return stripos($product, $keyword) !== false;
    });
}

$products = ["iPhone 15", "Samsung Galaxy", "HP Laptop", "Dell Laptop"];

print_r(searchProducts($products, "Laptop"));
?>