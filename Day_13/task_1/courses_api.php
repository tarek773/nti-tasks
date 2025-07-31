<?php
header("Content-Type: application/json");
require_once 'db.php';

if (isset($_GET['ids'])) {
    $ids = explode(',', $_GET['ids']);
    $ids = array_filter($ids, 'is_numeric'); // تنظيف

    if (count($ids) > 0) {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $types = str_repeat('i', count($ids));

        $stmt = $conn->prepare("SELECT * FROM courses WHERE id IN ($placeholders)");
        $stmt->bind_param($types, ...$ids);
        $stmt->execute();
        $result = $stmt->get_result();

        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }

        echo json_encode($courses);
        exit;
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();

    echo json_encode($course ?: ["message" => "Course not found"]);
    exit;
}

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}
echo json_encode($courses);
?>
