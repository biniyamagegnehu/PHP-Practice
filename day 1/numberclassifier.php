<?php 
    $number = 60;

    if ($number > 0) {
        echo "positive <br/>";
    } elseif ($number < 0) {
        echo "negative <br/>";
    } elseif ($number == 0){
        echo "zero <br/>";
    }

    if ($number%2 == 0) {
        echo "even <br/>";
    } else {
        echo "odd <br/>";
    }

    $count = 0;

    for ($i=1; $i < $number ; $i++) { 
        if($number % $i){
            $count +=1;
        }
    }

    if ($count > 2) {
        echo "not prime <br/>";
    } else {
        echo "prime <br/>";
    }
?>