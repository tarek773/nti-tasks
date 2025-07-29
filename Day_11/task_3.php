<?php 

class course {
    private $name;
    private $instructor;

    public function __construct($name, $instructor) {
        $this->name = $name;
        $this->instructor = $instructor;
    }
    public function description() {
        return "Course: {$this->name}, Instructor: {$this->instructor}";
    }
}


$course1 = new course("PHP Programming", "John Doe");

echo $course1->description();