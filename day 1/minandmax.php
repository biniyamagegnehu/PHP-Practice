<?php
$nums1=[12,5,78,-3,42];
$min=$nums1[0];
$max=$nums1[0];

foreach($nums1 as $value){
    if( $value<$min){
        $min=$value;
    }
    if($value>$max){
        $max=$value;
    }
}
echo "the minimum $min <br/> the maximum value is $max";
?>