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
        echo "Car Year: " . $this->year;
    }
}

$car1 = new Car();

$car1->make = "Toyota";
$car1->model = "Fortuner";
$car1->year = 2024;

$car1->displayDetails();

?>