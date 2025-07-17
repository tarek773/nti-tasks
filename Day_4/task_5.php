<?php
$tools = ["VS Code", "Git", "GitHub", "Figma", "Postman"];

echo "Total tools: " . count($tools) . "<br>";

if (in_array("GitHub", $tools)) {
    echo "GitHub is in the tools list.<br>";
} else {
    echo "GitHub is NOT in the tools list.<br>";
}

echo "All tools:<br>" ;
print_r(array_values($tools));

