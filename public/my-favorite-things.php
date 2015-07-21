<?php

$favthings = array(
	'Dancing',
	'Singing',
	'Drinking',
	'Playing Basketball',
	'Eating'
); 


?>

<html>
<head>
	<title>Favorite Things</title>

	<style>
		.class{
			border: 1px solid black;
		}
	</style>

</head>
<body>

	<h1 align="center">These are a few of my favorite things</h1>
	<div class ="table">
		<tr>
	    <?php foreach ($favthings as $faves) { ?>
	        <td><?php echo $faves ?></td>
	    <?php } ?>
	    </tr>
	</div>


</body>
</html>
