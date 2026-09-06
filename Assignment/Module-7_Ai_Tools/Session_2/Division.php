<?php
$number = 10;
$zero = 0;
$result = $number / $zero;
echo "Result: " . $result;
?> 

<?php

$number = 10;
$zero = 0;

if ($zero != 0) {
    $result = $number / $zero;
    echo "Result: " . $result;
} else {
    echo "Error: Cannot divide by zero.";
}

?>