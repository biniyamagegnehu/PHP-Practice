<?php
$num1=[13,5,7,2];
$sum=0;

foreach($num1 as $value){
    $sum=$value + $sum; 
}

echo $sum;

?>