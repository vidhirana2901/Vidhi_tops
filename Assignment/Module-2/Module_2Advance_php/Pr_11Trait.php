<?php

// First Trait
trait Message1
{
    public function hello()
    {
        echo "Hello World<br>";
    }
}

// Second Trait
trait Message2
{
    public function welcome()
    {
        echo "Welcome to PHP";
    }
}

// Class using multiple traits
class Test
{
    use Message1, Message2;
}

// Create object
$obj = new Test();

// Call methods
$obj->hello();
$obj->welcome();

?>