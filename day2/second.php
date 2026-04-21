<?php
$data = [
    "employees" => [
        ["firstName" => "John", "lastName" => "Doe"],
        ["firstName" => "Anna", "lastName" => "Smith"],
        ["firstName" => "Peter", "lastName" => "Jones"]
    ]
];

$jsonData = json_encode($data, JSON_PRETTY_PRINT);

if ($jsonData === false) {
    die("Error encoding JSON.");
}

$result = file_put_contents("employees.json", $jsonData);

if ($result === false) {
    echo "Error writing to file.";
} else {
    echo "Data successfully written to employees.json";
}
?>