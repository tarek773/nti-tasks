<?php
header("Content-Type: application/json");

class Student {
    public $name;
    public $email;
    public $age;
    private $isActive = false;

    public function __construct($name, $email, $age) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function activate() {
        $this->isActive = true;
    }

    public function getStatus() {
        return $this->isActive ? "Activated" : "Not Active";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $name = $input['name'] ?? null;
    $email = $input['email'] ?? null;
    $age = $input['age'] ?? null;

    if ($name && $email && $age) {
        $student = new Student($name, $email, $age);
        $student->activate();

        $welcome = "Welcome, " . $student->name . "!";
        $status = $student->getStatus();

        echo json_encode([
            "welcome" => $welcome,
            "status" => $status
        ]);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Missing name, email or age"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => "Only POST method is allowed"]);
}
