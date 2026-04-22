<?php
$jsonData = file_get_contents("data.json");

if ($jsonData === false) {
    die("Error reading JSON file.");
}

$dataArray = json_decode($jsonData, true);

if ($dataArray === null) {
    die("Invalid JSON format.");
}

echo "Name: " . ($dataArray['name'] ?? 'N/A') . "<br>";
echo "Age: " . ($dataArray['age'] ?? 'N/A') . "<br>";
echo "City: " . ($dataArray['city'] ?? 'N/A');
?>