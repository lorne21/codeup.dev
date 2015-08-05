<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');
require_once '../db_connect.php';
require_once '../Input.php';

$error = "";


// **ALL OF THIS HANDLES THE POST INFORMATION**
if(!empty($_POST)){
	if (Input::has('name') &&
		Input::has('location') &&
		Input::has('date_established') && 
		Input::has('area_in_acres') &&
		Input::has('description')
	){
		$post = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
						       VALUES (:name, :location, :date_established, :area_in_acres, :description)');

		$post->bindValue(':name', Input::get('name'), PDO::PARAM_STR);
		$post->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
		$post->bindValue(':date_established', $_POST['date_established'], PDO::PARAM_STR);
		$post->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO::PARAM_STR);
		$post->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
		$post->execute();
	} else {
		$error = "Please enter all of the fields";
	}
}



// **ALL OF THIS HANDLES THE LIMIT AND DISPLAY**
if (empty($_GET)){
	header('location: ?page=1');
	exit();
}

$limit = 4;
$offset = (($_GET['page']-1) * $limit);

$count = $dbc->query("SELECT count(*) FROM national_parks");
$columnCount = $count->fetchColumn();
$maxpage = ceil($columnCount / $limit);

if ($_GET['page'] > $maxpage || !is_numeric($_GET['page']) || $_GET['page'] < 1){
	header("location: ?page=$maxpage");
	exit();
}

$stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :limit OFFSET :offset'); 
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

	<style type="text/css">

		div{
			width: 600px ;
	  		margin-left: auto ;
	  		margin-right: auto ;
		}

		h3{
			color: red; 
		}

		.jumbotron{
			width:100%;
  			height:400px;
			background-image:url('/img/Sedona2.jpg');
			background-size:cover; 
		}


	</style>
</head>
<body>
	<div class="jumbotron">
		<div class="container"></div>
	</div>
 	<h1>National Parks</h1>
		<table class='table table-striped table-bordered table-hover'>
			<tr>
				<th>Park Name</th>
				<th>Location</th>
				<th>Date Established</th>
				<th>Size(In Acres)</th>
				<th>Description</th>
			</tr>
		<? foreach($parks as $key => $park): ?>
			<tr>
				<td><strong><?= $park['name']; ?></strong></td>
				<td><?= $park['location']; ?></td>
				<td><?= $park['date_established']; ?></td> 
				<td><?= $park['area_in_acres']; ?></td>
				<td><?= $park['description']; ?></td>
			</tr> 
	 	<? endforeach ?>
		</table>

		<h2 align='center'>Insert a New Park</h2>
		<h3 align='center'><?= $error ?></h3>
		<div>
			<form method="POST" class="form-horizontal">
				<div class="form-group">
				    <label for="name" class="col-sm-2 control-label">Park Name</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="name" name="name" placeholder="Park Name">
				    </div>
				</div>
				<div class="form-group">
				    <label for="location" class="col-sm-2 control-label">Location</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="location" name="location" placeholder="Park Location">
				    </div>
				</div>
		        <div class="form-group">
				    <label for="date_established" class="col-sm-2 control-label">Date Established</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="date_established" name="date_established" placeholder="YYYY-MM-DD">
				    </div>
				</div>
				<div class="form-group">
				    <label for="area_in_acres" class="col-sm-2 control-label">Area</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="area_in_acres" name="area_in_acres" placeholder="Area">
				    </div>
				</div>
		      	<div class="form-group">
				    <label for="description" class="col-sm-2 control-label">Description</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" id="description" name="description" placeholder="Park Name">
				    </div>
				</div>
		        <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				    	<button type="submit" class="btn btn-primary">Add Park</button>
				    </div>
				</div>
	    	</form>
	    </div>


		<?php if($_GET['page'] != $maxpage) : ?>
			<div align='center'><a href='?page=<?= $_GET['page'] + 1; ?>'>Next Page</a></div>
		<?php endif; ?>
		
		<? if($_GET['page'] >= 2) : ?>
			<div align='center'><a href='?page=<?= $_GET['page'] - 1; ?>'>Previous Page</a></div>
		<?php endif; ?>
		
 </html>