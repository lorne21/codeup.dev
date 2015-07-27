<?php

session_start();

require_once "../Auth.php";


$_SESSION['loginmessage'] = '';

$username = escape(Input::get('username')); 
$passwords = escape(Input::get('password'));


if (Auth::check()){
	if ($_SESSION['LOGGED_IN_USER']){
		$_SESSION['loginmessage'] = 'Logged in';
		header("Location: http://codeup.dev/authorized.php");
		exit();
	} 
}
 
if(Auth::attempt($username, $passwords)){	
	header("Location: http://codeup.dev/authorized.php");
	exit();
} 

?>

<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1 align="center">Login</h1>

	<p><?= $_SESSION['loginmessage'] ?></p> 
	
	<form method="POST">
		<label>Username</label>
		<input type="text" name="username"><br>
		<label>Password</label>
		<input type="text" name="password"><br>
		<input type="submit">
	</form>

</body>
</html>
