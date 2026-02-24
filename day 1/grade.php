<?php
 $grade = 80;

 if ($grade >= 85 && $grade <= 100 ) {
  echo "A";  
 } elseif ($grade >= 70 && $grade < 85) {
    echo "B";
 } elseif ($grade >= 60 && $grade < 80) {
    echo "C";
 } elseif ($grade >= 40 && $grade < 60) {
    echo "D";
 } elseif ($grade < 40 && $grade >= 0) {
    echo "F";
 } else {
    echo "Wrong input";
 };

?>