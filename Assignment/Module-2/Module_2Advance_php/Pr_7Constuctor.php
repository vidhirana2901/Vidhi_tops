<?php

class Employee
{
    public $name;
    public $salary;

    // Constructor
    public function __construct($n, $s)
    {
        $this->name = $n;
        $this->salary = $s;
    }

    // Method
    public function display()
    {
        echo "Employee Name: " . $this->name . "<br>";
        echo "Salary: " . $this->salary;
    }
}

// Create object
$e1 = new Employee("Vidhi", 25000);

// Call method
$e1->display();

?>