<?php

class Student
{
    private $marks;

    public $name;

    public function setMarks($m)
    {
        $this->marks = $m;
    }

    public function getMarks()
    {
        return $this->marks;
    }
}

$s1 = new Student();

$s1->name = "Vidhi";

$s1->setMarks(85);

echo "Student Name: " . $s1->name . "<br>";
echo "Student Marks: " . $s1->getMarks();

?>