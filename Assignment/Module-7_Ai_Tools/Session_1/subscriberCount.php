<?php

function formatSubscribers($number)
{
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'K';
    } else {
        return $number;
    }
}

// Test with three different numbers
echo formatSubscribers(1500) . "<br>";
echo formatSubscribers(1200000) . "<br>";
echo formatSubscribers(120000) . "<br>";
echo formatSubscribers(850) . "<br>";

?>