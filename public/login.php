<?php

var_dump($_POST); 
 
if(!empty($_POST)){
	if ($_POST['username'] == "guest" && $_POST['password'] == "password"){
		header("Location: http://codeup.dev/authorized.php");
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
