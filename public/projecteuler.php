<?php

$findFactor = 13195; 

$arrayToCheck = [];

$examplearray = [5, 7, 15, 19, 25];

$isNotPrime = [];

for ($i = 3; $i <= $findFactor; $i++){
	if ($findFactor % $i == 0){
		// echo $i . PHP_EOL; 
		array_push($arrayToCheck, $i); 
	}
}














?>