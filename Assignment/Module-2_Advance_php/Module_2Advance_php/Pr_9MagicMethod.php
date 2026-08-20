<?php

class Student
{
    private $data = array();

    // Constructor
    public function __construct()
    {
        echo "Object Created<br>";
    }

    // Set value
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    // Get value
    public function __get($name)
    {
        return $this->data[$name];
    }
}

// Create object
$s1 = new Student();

// Set values
$s1->name = "Vidhi";
$s1->age = 20;

// Get values
echo "Name: " . $s1->name . "<br>";
echo "Age: " . $s1->age;

?>