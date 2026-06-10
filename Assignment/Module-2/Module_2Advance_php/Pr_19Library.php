<?php

// Interface
interface LibraryOperations
{
    public function issueBook();
    public function returnBook();
}

// Abstract Class
abstract class Person
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function display();
}

// Book Class (Encapsulation)
class Book
{
    private $title;
    private $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

// Inheritance + Interface + Polymorphism
class Student extends Person implements LibraryOperations
{
    private $book;

    public function __construct($name, $book)
    {
        parent::__construct($name);
        $this->book = $book;
    }

    public function issueBook()
    {
        echo "<br>Book Issued : " . $this->book->getTitle();
    }

    public function returnBook()
    {
        echo "<br>Book Returned : " . $this->book->getTitle();
    }

    public function display()
    {
        echo "<h3>Student Name : " . $this->name . "</h3>";
    }
}

// Static Member
class Library
{
    public static $totalBooks = 0;

    public static function addBook()
    {
        self::$totalBooks++;
    }
}

// Final Class
final class Rules
{
    public function showRules()
    {
        echo "<br>Rule : Return book within 15 days.";
    }
}

// Main Program

$book = new Book("PHP Programming", "John");

Library::addBook();

$student = new Student("Vidhi Rana", $book);

$student->display();
$student->issueBook();
$student->returnBook();

echo "<br><br>Total Books : " . Library::$totalBooks;

$rule = new Rules();
$rule->showRules();

?>