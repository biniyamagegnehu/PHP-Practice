<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="file.php" method="post">
    First Name: <input type="text" name="fname" required><br>
    Last Name: <input type="text" name="lname" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = htmlspecialchars($_POST["fname"]);
    $lname = htmlspecialchars($_POST["lname"]);
    $mail  = htmlspecialchars($_POST["email"]);

    $fh = fopen("guest.txt", "a");

    if ($fh === false) {
        echo "Error: Unable to open file.";
    } else {
        $data = $fname . "\t" . $lname . "\t" . $mail . PHP_EOL;
        fwrite($fh, $data);
        fclose($fh);

        echo "Your data is saved successfully!";
    }
}
?>