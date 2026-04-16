<?php
// Create an array
$numbers = array(10, 15, 22, 33, 40, 55, 60);

// Initialize counters
$even = 0;
$odd = 0;

// Loop through array
foreach($numbers as $num)
{
    if($num % 2 == 0)
    {
        $even++;
    }
    else
    {
        $odd++;
    }
}

// Display results
echo "Total Even Numbers: " . $even . "<br>";
echo "Total Odd Numbers: " . $odd;
?>
