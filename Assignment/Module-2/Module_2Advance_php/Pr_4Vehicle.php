<?php

// Parent Class
class Vehicle
{
    public $brand;
    public $speed;

    public function vehicleInfo()
    {
        echo "Brand: " . $this->brand . "<br>";
        echo "Speed: " . $this->speed . " km/h<br>";
    }
}

// Child Class
class Car extends Vehicle
{
    public $model;
    public $year;

    public function carInfo()
    {
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}

$car1 = new Car();

// Access inherited properties
$car1->brand = "Toyota";
$car1->speed = 180;

// Access child class properties
$car1->model = "Fortuner";
$car1->year = 2024;

// inherited method
echo "<h3>Vehicle Information</h3>";
$car1->vehicleInfo();

// child class method
echo "<h3>Car Information</h3>";
$car1->carInfo();

?>