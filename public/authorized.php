<?php

var_dump($_POST); 

session_start();

$username = "";

if($_SESSION['LOGGED_IN_USER'] == true){
	if (isset($_SESSION['USERNAME'])){
		$username = $_SESSION['USERNAME'];
	} 
} else {
	header("Location: login.php");
	exit();
}


?>


<html>
<head>
	<title>Authorized</title>
</head>
<body>
	<p>Authorized</p>
	<p><?= $username ?></p> 

	<a href="logout.php">Logout</a>
</body>
</html>