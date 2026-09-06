<?php

function filterRestaurants($restaurants, $keyword)
{
    $result = [];
    foreach ($restaurants as $restaurant) {
        if (stripos($restaurant['name'], $keyword) !== false || stripos($restaurant['cuisine'], $keyword) !== false) {
            $result[] = $restaurant;
        }
    }
    return $result;
}
$restaurants = [
    ['name' => 'Pasta Palace', 'cuisine' => 'Italian'],
    ['name' => 'Sushi Central', 'cuisine' => 'Japanese'],
    ['name' => 'Curry Corner', 'cuisine' => 'Indian'],
    ['name' => 'Burger Barn', 'cuisine' => 'American'],
];
$result = filterRestaurants($restaurants, 'Curry');
print_r($result);
?>