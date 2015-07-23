<?php

var_dump($_POST); 

session_start();

$_SESSION['LOGGED_IN_USER'] = false; 
session_destroy();
session_start();
$_SESSION = array();
header("Location: http://codeup.dev/login.php");
exit();


?>