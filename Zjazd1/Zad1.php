<?php
$owoce = array ( "jablko", "banan", "pomarancza", "pomelo");

for($i=0;$i<4;$i++){
	$temp = $owoce[$i];
    $len = strlen($temp) - 1;
    for($j=$len; $j>=0; $j--){
    	echo($temp[$j]);
    }
    echo("\n");
    echo"|";
    echo("\n");
    if($temp[0] == "p"){
    	echo ($temp . " zaczyna sie na P");
    }
    else{
    	echo ($temp . " nie zaczyna sie na P");
    }
    echo("<br>");
}
?>
