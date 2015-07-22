<?php

// ALPHABET SOUP
// take a string and reverse each word in it

$str = "hello codeup";

function alphabet_soup($str){
	$alphaArray = explode(" ", $str); 
	print_r($alphaArray);
	$reverseArray = []; 

	foreach ($alphaArray as $word) {
		$revword = strrev($word);
		echo $revword . PHP_EOL;
		$reverseArray[] = $revword;   
	}
	$str = implode(" ", $reverseArray);
	return $str; 
}

// echo alphabet_soup($str);

// FIND THE number
// write a function that finds the smallest positive number
// that is evenly divisible by all numbers 1-20

function findNumber(){
	$theNumber = 20; 
	for ($i = 1; $i <= 20; $i++){
		if ($theNumber % $i != 0){
			$i = 1;
			$theNumber++;
		}
	}
	echo $theNumber . PHP_EOL;
}

findNumber();
// the answer is 232792560





?>