<?php
 
function pageController()
{
	$data = [];

	$data['counter'] = 0;
	
	if(isset($_GET['request'])){
		if ($_GET['request'] == 'up'){
			$_GET['count']++; 
			$data['counter'] = $_GET['count'];
		} else if ($_GET['request'] == 'down'){
			$_GET['count']--; 
			$data['counter'] = $_GET['count'];
		}
	} 
	

	return $data; 
}

extract(pageController());


?>

<html>
<head>
	<title>Counter</title>

	<style>
		
		.container{
			height: 200px; 
			width: 200px; 
			margin-left: auto;
			margin-right: auto; 
			background: url(/img/count.jpg) center no-repeat;


		}

	</style>

</head>
<body>

	<h1 align="center">The Count....Ah, Ah, Ahhh</h1>
	<h2 align="center"><?= $counter ?></h2>
	<div id="updown" align="center">
	     <a href="?request=up&count=<?=$counter?>">UP>
	     <a href="?request=down&count=<?=$counter?>">DOWN>
	</div>
	<br>
	<div align="center" class="container"></div>

</body>
</html>
