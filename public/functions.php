<?php


function inputHas($key){
	if (isset($_REQUEST[$key])){
		return true; 
	} else {
		return false; 
	}
}

// echo inputHas('username'); 


function inputGet($key){
	if (isset($_REQUEST[$key])){
		return $_REQUEST[$key]; 
	} else {
		return null; 
	}
}

// echo inputGet('username');

function escape($input){
	$newString = htmlspecialchars(strip_tags($input));
	return $newString; 
}















?>