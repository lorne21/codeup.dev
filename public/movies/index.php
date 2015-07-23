<?php

session_start();

require '../functions.php';

$movies = [];

if (!empty($_SESSION['movies'])){
	$movies = $_SESSION['movies'];
}

if (!empty($_POST)){
	$movies[] = $_POST;
} 

$_SESSION['movies'] = $movies;

var_dump($_SESSION['movies']);

// echo inputGet('title'); 


?>

<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1 align="center">Movies</h1>
	
	<form method="POST">
		<label>Movie Title</label>
		<input type="text" name="title"><br>
		<label>Movie Description</label>
		<input type="text" name="description"><br>
		<input type="submit">
	</form>

</body>
</html>