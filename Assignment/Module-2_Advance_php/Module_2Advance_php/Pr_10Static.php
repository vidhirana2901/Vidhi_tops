<?php

class Student
{
    // Static property
    public static $college = "ABC College";

    // Static method
    public static function display()
    {
        echo "College Name: " . self::$college;
    }
}

// Access static property
echo Student::$college . "<br>";

// Access static method
Student::display();

?>