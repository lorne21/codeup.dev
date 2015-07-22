<?php

var_dump($_POST); 

session_start();


if($_SESSION['LOGGED_IN_USER'] = true){
	$_SESSION['LOGGED_IN_USER'] = false; 
	session_destroy();
	session_start();
	$_SESSION = array();
	header("Location: http://codeup.dev/login.php");
	exit();

} else {
	session_destroy();
	session_start();
	$_SESSION = array();
	header("Location: http://codeup.dev/login.php");
	exit();
}


?>