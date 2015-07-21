<?php

$adjectives = array(
	'Metallic',
	'Incessantly Talking',
	'Glowing',
	'Explosive',
	'Impervious',
	'Super Stretchy', 
	'Electric', 
	'Extremely Visible', 
	'Screaming', 
	'Rapidly Pulsating'
); 

$nouns = array(
	'Fingernails',
	'Genitals',
	'Nostrils',
	'Earlobes',
	'Belly Lint',
	'Breath', 
	'Farts',
	'Pinky Toes', 
	'Nipples',
	'Armpits'
);

function getRandom($array)
{
	$part = mt_rand(0, (count($array)-1)); 
	$arrayChoice = $array[$part];
	return $arrayChoice . PHP_EOL; 
}

function pageController($adjectives, $nouns)
{
	$data = [];

	$data['super'] = getRandom($adjectives);
	$data['power'] = getRandom($nouns); 

	return $data; 
}

extract(pageController($adjectives, $nouns));

?>

<html>
<head>
	<title>Name Generator </title>

</head>
<body>

	<h1 align="center">What's Your Super Power?</h1>
	<h2 align="center"><?= $super . " " . $power; ?></h2>

	<div align="center"><button id="newName">Get New Name</button></div> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<script>

	$('#newName').click(function(e) {
		location.reload(); 
	});


	</script> 


</body>
</html>
