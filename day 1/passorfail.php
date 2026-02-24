<?php
$students = [
    ["name" => "Kaleb", "scores" => [70, 80, 90]],
    ["name" => "Anna", "scores" => [50, 60, 55]],
    ["name" => "John", "scores" => [30, 40, 35]]
];

foreach ($students as $student) {
    $average = array_sum($student["scores"]) / count($student["scores"]);
    $status = $average >= 60 ? "Pass" : "Fail";
    echo $student["name"] . " - Average: " . round($average, 2) . " - " . $status . "\n";
}
?>