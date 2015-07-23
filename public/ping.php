<?php

require 'functions.php'
 
function pageController()
{
	$data = [];
	
	$data['counter'] = 0;
	
	if(isset($_GET['request'])){
		if ($_GET['request'] == 'hit'){
			$_GET['count']++; 
			$data['counter'] = $_GET['count'];
		} else if ($_GET['request'] == 'miss'){
			echo ("You Lose");
			$_GET['count'] = 0;
			$data['counter'] = $_GET['count'];
		} 
	}

	return $data; 
}

extract(pageController());


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
