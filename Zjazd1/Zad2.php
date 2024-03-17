<?php
$start = 0;
$end = 5;
function czyPierwsza($n)
{
 for($i=2; $i<$n; $i++)
   {
      if($n % $i == 0)
	      {
		  	return 0;
		  }
   }
  return 1;
}
echo("Liczby pierwsze z zakresu ".$start." - ".$end." : ");
for($i=$start; $i<=$end ;$i++){
	if(czypierwsza($i) == 1){
    	echo($i. "\n");
    }
    
}
?>