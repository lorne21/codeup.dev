<?php

var_dump($_POST); 

session_start();

$_SESSION['LOGGED_IN_USER'] = false;
 
if(!empty($_POST)){
	if ($_POST['username'] == "guest" && $_POST['password'] == "password"){
		$_SESSION['LOGGED_IN_USER'] = true;
		$_SESSION['USERNAME'] = $_POST['username']; 
		if ($_SESSION['LOGGED_IN_USER']) {	
			header("Location: http://codeup.dev/authorized.php");
			exit();
		}
	} else {
		echo "Login Failed!";
	}
}



	
	



?>

<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1 align="center">Login</h1>
	
	<form method="POST">
		<label>Username</label>
		<input type="text" name="username"><br>
		<label>Password</label>
		<input type="text" name="password"><br>
		<input type="submit">
	</form>

</body>
</html>
