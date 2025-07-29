<?php 
class Book {
    public $title;

    function read() {
        return "Reading {$this->title}";
    }
}

$book1 = new Book();
$book1->title = "PHP for Beginners";
echo $book1->read();