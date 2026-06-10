<?php

class Demo
{
    // Properties
    public $name = "Vidhi";
    protected $city = "Ahmedabad";
    private $salary = 25000;

    // Public method
    public function showPublic()
    {
        echo "Public Property: " . $this->name . "<br>";
    }

    // Protected method
    protected function showProtected()
    {
        echo "Protected Property: " . $this->city . "<br>";
    }

    // Private method
    private function showPrivate()
    {
        echo "Private Property: " . $this->salary . "<br>";
    }

    // Public method to access all methods
    public function display()
    {
        $this->showPublic();
        $this->showProtected();
        $this->showPrivate();
    }
}

// Create object
$obj = new Demo();

// Access public property
echo $obj->name . "<br><br>";

// Call public method
$obj->showPublic();

echo "<br>Accessing all properties inside class:<br>";
$obj->display();

?>