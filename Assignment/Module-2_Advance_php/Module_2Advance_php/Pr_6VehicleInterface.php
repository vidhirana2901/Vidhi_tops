<?php

// Interface
interface VehicleInterface
{
    public function start();
    public function stop();
}

// First Class
class Car implements VehicleInterface
{
    public function start()
    {
        echo "Car Started<br>";
    }

    public function stop()
    {
        echo "Car Stopped<br>";
    }
}

// Second Class
class Bike implements VehicleInterface
{
    public function start()
    {
        echo "Bike Started<br>";
    }

    public function stop()
    {
        echo "Bike Stopped<br>";
    }
}

$c = new Car();
$b = new Bike();

$c->start();
$c->stop();

$b->start();
$b->stop();

?>