<?php
echo "<h2>PHP File Modes Demonstration</h2>";

$fileName = "demo.txt";

$file = fopen($fileName, "w");
fwrite($file, "Mode w: This overwrites the file\n");
fclose($file);
echo "1. w mode executed (file overwritten)<br>";

$file = fopen($fileName, "w+");
fwrite($file, "Mode w+: Overwrites again\n");
rewind($file);
echo "2. w+ mode read: " . fread($file, 100) . "<br>";
fclose($file);

$file = fopen($fileName, "a");
fwrite($file, "Mode a: Appended line\n");
fclose($file);
echo "3. a mode executed (appended)<br>";

$file = fopen($fileName, "a+");
fwrite($file, "Mode a+: appended with read access\n");
rewind($file);
echo "4. a+ mode content:<br>" . fread($file, 200) . "<br>";
fclose($file);

$file = fopen($fileName, "r");
echo "5. r mode read:<br>" . fread($file, 200) . "<br>";
fclose($file);

$file = fopen($fileName, "r+");
fwrite($file, "R+ mode overwrites beginning\n");
rewind($file);
echo "6. r+ mode read:<br>" . fread($file, 200) . "<br>";
fclose($file);

$file = @fopen("xmode.txt", "x");
if ($file) {
    fwrite($file, "Mode x: file created\n");
    fclose($file);
    echo "7. x mode: file created<br>";
} else {
    echo "7. x mode: file already exists (failed)<br>";
}

$file = @fopen("xplus.txt", "x+");
if ($file) {
    fwrite($file, "Mode x+: created file\n");
    rewind($file);
    echo "8. x+ mode:<br>" . fread($file, 100) . "<br>";
    fclose($file);
} else {
    echo "8. x+ mode: file already exists (failed)<br>";
}

$file = fopen("cmode.txt", "c");
fwrite($file, "Mode c: does not delete existing content\n");
fclose($file);
echo "9. c mode executed<br>";

$file = fopen("cplus.txt", "c+");
fwrite($file, "Mode c+: read/write without deleting\n");
rewind($file);
echo "10. c+ mode:<br>" . fread($file, 200) . "<br>";
fclose($file);

echo "<br><b>All file modes demonstrated successfully.</b>";
?>