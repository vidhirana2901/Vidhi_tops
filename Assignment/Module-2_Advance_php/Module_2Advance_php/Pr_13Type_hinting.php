<?php

class Demo
{
    // Method with type-hinted parameters
    public function add(int $a, int $b)
    {
        echo "Addition: " . ($a + $b) . "<br>";
    }

    public function showName(string $name)
    {
        echo "Name: " . $name . "<br>";
    }
}

// Create object
$obj = new Demo();

// Call methods
$obj->add(10, 20);
$obj->showName("Vidhi");

?>