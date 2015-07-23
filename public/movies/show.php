<?php
 session_start();

 if(empty($_POST['title']) || empty($_POST['description'])){
 	header('movies/index.php');
 } 





?>

<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1 align="center">Movies</h1>
	
	<p></p>
	<p></p> 

</body>
</html>