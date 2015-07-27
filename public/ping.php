<?php

require_once '../Input.php';
 
$counter = 0;

if (Input::has('request')){
	if(Input::get('request') == 'hit'){
		$_GET['count']++;
		$counter = $_GET['count'];
	} else if (Input::get('request') == 'miss'){
		echo ("You Lose");
		$_GET['count'] = 0; 
		$counter = $_GET['count'];
	}
} 


?>

<html>
<head>
	<title>Ping</title>

</head>
<body>

	<h1 align="center">Ping</h1>
	<h2 align="center"><?= $counter ?></h2>
	<div id="updown" align="center">
	     <a href="pong.php?request=hit&count=<?=$counter?>">Hit</a>
	     <a href="?request=miss&count=<?=$counter?>">Miss</a>
	</div>

</body>
</html>
