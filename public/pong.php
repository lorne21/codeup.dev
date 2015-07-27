<?php

require_once '../input.php';
 
$counter = 0;

if (Input::has('request')){
	if(Input::get('request') == 'hit'){
		$_REQUEST['count']++;
		$counter = $_REQUEST['count'];
	} else if (Input::get('request') == 'miss'){
		echo ("You Lose");
		$_REQUEST['count'] = 0; 
		$counter = $_REQUEST['count'];
	}
} 




?>

<html>
<head>
	<title>Pong</title>

</head>
<body>

	<h1 align="center">Pong</h1>
	<h2 align="center"><?= $counter ?></h2>
	<div id="updown" align="center">
	     <a href="ping.php?request=hit&count=<?=$counter?>">Hit</a>
	     <a href="?request=miss&count=<?=$counter?>">Miss</a>
	</div>

</body>
</html>
