<?php

// var_dump($_POST); 

session_start();

require_once "../Auth.php";

if(Auth::check()){
	$_SESSION['loginmessage'] = 'Logged in';
} else {
	header("Location: login.php");
	exit();
}

// var_dump(Auth::check());


?>


<html>
<head>
	<title>Authorized</title>
</head>
<body>
	<h2>Authorized</h2>
	<p><?= $_SESSION['loginmessage'] ?></p>
	<p>User: <?= $_SESSION['USERNAME'] ?></p> 

	<a href="logout.php">Logout</a>
</body>
</html>