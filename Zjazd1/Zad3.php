<?php

function fib($n){
	if($n == 0){
    	return 0;
    }
    if($n < 3){
        return 1;
    }
    
    return fib($n - 2) + fib($n - 1);
}

$n = 10;
$fibArr = array();
for($i = 0; $i < $n; $i++){
    $fibArr[$i] = fib($i);
}


for($i = 0; $i < $n; $i++){
    if($fibArr[$i] % 2 != 0){
        echo $i. ". " . $fibArr[$i] . "<br>";    
    }
    
}



?>
