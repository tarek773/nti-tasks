<?php 

class Employee {
    public $name;
    protected $salary;
    private $bonus;

    public function __construct($name = "Unknown", $salary = 30000, $bonus = 5000) {
        $this->salary = $salary; 
        $this->name = $name;
        $this->bonus = $bonus; 
    }

  
    function showDetails() {
        return "Name: {$this->name}, Salary: {$this->salary}, Bonus: {$this->bonus}";
    }
}

$employee1 = new Employee('John Doe', 60000, 7000);
echo $employee1->showDetails();