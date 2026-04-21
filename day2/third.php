<?php
$data = [
    "id" => 1,
    "name" => "Aster",
    "role" => "Developer"
];

$jsonData = json_encode($data, JSON_PRETTY_PRINT);

if ($jsonData === false) {
    die("Error encoding JSON.");
}

$file = fopen("user.json", "w"); 

if ($file === false) {
    die("Error opening file.");
}

fwrite($file, $jsonData);

fclose($file);

echo "Data written to user.json";
?>