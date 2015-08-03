<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');
require_once '../db_connect.php';

$offset = (($_GET['page']-1) * 4);

if (empty($_GET)){
	header('location: ?page=1');
	exit();
}

$parks = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET $offset")->fetchAll(PDO::FETCH_ASSOC); 

$stmt = $dbc->query("SELECT count(*) FROM national_parks");
$stmt1 = $stmt->fetchColumn();
$maxpage = ceil($stmt1 / 4);

if ($_GET['page'] > $maxpage){
	header("location: ?page=$maxpage");
	exit();
}
// echo $stmt1; 

// echo 'There are ' . $stmt->fetchColumn() . ' national parks in our database' . PHP_EOL;

?>

<!DOCTYPE html>
<head>
	<style type="text/css">
	td{
		border: 1px solid black;
	}
	table{
		text-align: center;
		border: 1px solid black;
		width: 600px;
	}

	h1{
		text-align: center; 
	}




	</style>
</head>
<body>
 	<h1>National Parks</h1>
		<table align='center'>
			<tr><strong>
				<td><strong>Park Name</strong></td>
				<td><strong>Location</strong></td>
				<td><strong>Date Established</strong></td>
				<td><strong>Size(In Acres)</strong></td>
			</tr>
		<? foreach($parks as $key => $park): ?>
			<tr>
			<td><strong><?= $park['name']; ?></strong></td>
			<td><?= $park['location']; ?></td>
			<td><?= $park['date_established']; ?></td> 
			<td><?= $park['area_in_acres']; ?></td>
			</tr> 
	 	<? endforeach ?>
		</table>
		<? if($_GET['page'] >= 1 && $_GET['page'] != $maxpage){
		echo "<div align='center'><a href='?page=" . ($_GET['page'] + 1). "'>Next Page</a></div>";
		}?>
		<br>
		<? if($_GET['page'] >= 2){
		echo "<div align='center'><a id='link' href='?page=" . ($_GET['page'] - 1). "'>Previous Page</a>";
		}?>
		<!-- // <a href="?request=previous&page=<?=$page?>">Previous Page</a> -->
 </html>