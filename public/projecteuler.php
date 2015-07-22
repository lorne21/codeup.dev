<?php

$findFactor = 13195; 

$arrayToCheck = [];

for ($i = 3; $i <= $findFactor; $i++){
	if ($findFactor % $i == 0){
		echo $i . PHP_EOL; 
		array_push($arrayToCheck, $i); 
	}
}

foreach ($arrayToCheck as $prime) {
	
	# code...
}












?>