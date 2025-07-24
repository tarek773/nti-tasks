<?php

$grade = 85; // Example grade
if (isset($grade)) 
    {if ($grade >= 50) {
    echo "Pass";
}else {
    echo "Fail";
}}else {
    echo "Grade not set";
}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @php
    $grade = 85; // Example grade
    if (isset($grade)) {
        if ($grade >= 50) {
            echo "Pass";
        }
        }
    @endphp
    
</body>
</html>
