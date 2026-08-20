<?php
// Original array
$arr = array(0, 5, 0, 3, 0, 8, 2);
// Print original array
echo "Original Array:<br>";
foreach($arr as $val)
{
    echo $val . " ";
}

echo "<br><br>";
// Separate non-zero and zero elements
$nonZero = array();
$zero = array();

foreach($arr as $value)
{
    if($value == 0)
    {
        $zero[] = $value;
    }
    else
    {
        $nonZero[] = $value;
    }
}

// Merge arrays
$result = array_merge($nonZero, $zero);

// Display result
echo "Updated Array:<br>";
foreach($result as $val)
{
    echo $val . " ";
}
?>