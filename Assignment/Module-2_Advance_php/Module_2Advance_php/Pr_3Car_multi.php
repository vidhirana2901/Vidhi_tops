<?php

class Car
{
    public $make;
    public $model;
    public $year;

    public function displayDetails()
    {
        echo "Car Make: " . $this->make . "<br>";
        echo "Car Model: " . $this->model . "<br>";
        echo "Car Year: " . $this->year . "<br><br>";
    }
}

// First Object
$car1 = new Car();
$car1->make = "Toyota";
$car1->model = "Fortuner";
$car1->year = 2024;

// Second Object
$car2 = new Car();
$car2->make = "Honda";
$car2->model = "City";
$car2->year = 2023;

// Third Object
$car3 = new Car();
$car3->make = "Hyundai";
$car3->model = "Creta";
$car3->year = 2025;

// Access properties directly
echo "<h3>Accessing Properties</h3>";
echo $car1->make . " - " . $car1->model . "<br>";
echo $car2->make . " - " . $car2->model . "<br>";
echo $car3->make . " - " . $car3->model . "<br><br>";

// Access methods
echo "<h3>Using Methods</h3>";
$car1->displayDetails();
$car2->displayDetails();
$car3->displayDetails();

?>