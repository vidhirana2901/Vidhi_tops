<?php

class Demo
{
    public function __call($name, $arguments)
    {
        if(count($arguments) == 1)
        {
            echo "One Argument: " . $arguments[0] . "<br>";
        }

        if(count($arguments) == 2)
        {
            echo "Two Arguments: " . $arguments[0] . " " . $arguments[1];
        }
    }
}

$obj = new Demo();

$obj->show("Vidhi");
$obj->show("Vidhi", 19);

?>