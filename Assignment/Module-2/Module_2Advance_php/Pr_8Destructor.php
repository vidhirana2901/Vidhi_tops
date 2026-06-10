<?php

class Test
{
    // Constructor
    public function __construct()
    {
        echo "Object Created<br>";
    }

    // Destructor
    public function __destruct()
    {
        echo "Object Destroyed";
    }
}

$obj = new Test();

?>