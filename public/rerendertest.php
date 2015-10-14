<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');
require_once '../db_connect.php';
require_once '../Input.php';



// **ALL OF THIS HANDLES THE LIMIT AND DISPLAY**
if (empty($_GET)){
	header('location: ?page=1');
	exit();
}

$limit = 6;
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

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- <div class="jumbotron">
		<div class="container"></div>
	</div> -->
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

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Launch parks modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel"><?= $park['name']; ?></h4>
	      </div>
	      <div class="modal-body">
	        <?= $park['description']; ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

		
 </html>