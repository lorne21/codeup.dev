<html>
<head>
	<title>SlipNSlide</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css">
		h1 {
			font: #000000;
			font-size: 2.5em;
		}
		
		#leftSide {
			z-index: 5;
			background-color: #FFF;
		}
		
		#rightSide {
			/*background: url("img/scoobyback6.jpg") no-repeat center;*/
			/*background-size: cover;*/
			background-position: relative;
			height: 731px;
			bottom: 0;
			min-width: 700px;
			max-width: 100%;
		}
		#gameboard {
			width: 546px;
			height: 660px;
			/*border: 1px solid black;*/
			position: absolute;
			bottom: 0;
			margin-left: 10%;
			/*margin-right: 15px;*/
		}
		.square {
			width: 180px;
			height: 185px;
			margin: 0;
			float: left;
			border: 3px solid black;
			transition: all 0.5s ease;
			text-align: center;
			font-size: 20px;
			font-weight: bold;
		}
		.activePlayer {
			background-color: red;
		}
		.activeComp{
			background-color: blue; 
		}
		
	</style>

	<script src="js/jquery.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3" id="leftSide">
				<h1>SlipNSlide</h1>

				<p>Begin Game:</p>
				<button class="btn btn-primary" id="start">Start</button>
				<br>
				<p>Moves Taken: <span id="moves"></span></p>
				<p>High Score: <span id="score">100</span></p>
			</div>
			<div class="col-md-9">
				<div id="rightSide">
					<div id="gameboard">
						<div class="square" id="sq0"></div>
						<div class="square" id="sq1"></div>
						<div class="square" id="sq2"></div>
						<div class="square" id="sq3"></div>
						<div class="square" id="sq4"></div>
						<div class="square" id="sq5"></div>
						<div class="square" id="sq6"></div>
						<div class="square" id="sq7"></div>
						<div class="square" id="sq8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>		


<script>

var numbers = ["1", "2", "3", "4", "5", "6", "7", "8", ""];
var answer = ["1", "2", "3", "4", "5", "6", "7", "8", ""];
var checkArray = [];
var movesTaken = 0; 
var highScore = 100; 

var square = document.getElementsByClassName('square');

// this function shuffles the array
function shuffle(o){
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}

function start(){
	movesTaken = 0; 
	$('#moves').html(movesTaken); 
	shuffle(numbers);
	console.log(numbers);
	// this assigns numbers to divs
	for (var i = 0; i < numbers.length; i++){
		square[i].innerHTML = numbers[i];
		if (square[i].innerHTML == ""){
			square[i].style.backgroundColor = "black"; 
		} else {
			square[i].style.backgroundColor = "red";
		}
	}
}

// this tracks how many moves you make
function moves(){
	movesTaken += 1;
	$('#moves').html(movesTaken);
	win();   
}

// this tracks game win/loss
function win(){
	checkArray = [];
	for (var i = 0; i < square.length; i++){
		checkArray.push(square[i].innerHTML);
	}
	if (checkArray.toString() == answer.toString()){
		alert("Well done!");
		if(parseInt($('#moves').html()) < highScore){
			highScore = parseInt($('#moves').html())
			$('#score').html(highScore);
		} 
	}
}

$('#start').click(start);
// these functions handle the behavior of each square
$("#sq0").click(function(e){
	if($("#sq1").html() == ""){
		$("#sq1").html($("#sq0").html()).css('background-color', 'red');
		$("#sq0").html("").css('background-color', 'black');
		moves(); 
	} else if($("#sq3").html() == ""){
		$("#sq3").html($("#sq0").html()).css('background-color', 'red');
		$("#sq0").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq1").click(function(e){
	if($("#sq0").html() == ""){
		$("#sq0").html($("#sq1").html()).css('background-color', 'red');
		$("#sq1").html("").css('background-color', 'black');
		moves();
	} else if($("#sq2").html() == ""){
		$("#sq2").html($("#sq1").html()).css('background-color', 'red');
		$("#sq1").html("").css('background-color', 'black');
		moves();
	} else if($("#sq4").html() == ""){
		$("#sq4").html($("#sq1").html()).css('background-color', 'red');
		$("#sq1").html("").css('background-color', 'black');
		moves();
	} 
});

$("#sq2").click(function(e){
	if($("#sq1").html() == ""){
		$("#sq1").html($("#sq2").html()).css('background-color', 'red');
		$("#sq2").html("").css('background-color', 'black');
		moves();
	} else if($("#sq5").html() == ""){
		$("#sq5").html($("#sq2").html()).css('background-color', 'red');
		$("#sq2").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq3").click(function(e){
	if($("#sq0").html() == ""){
		$("#sq0").html($("#sq3").html()).css('background-color', 'red');
		$("#sq3").html("").css('background-color', 'black');
		moves();
	} else if($("#sq6").html() == ""){
		$("#sq6").html($("#sq3").html()).css('background-color', 'red');
		$("#sq3").html("").css('background-color', 'black');
		moves();
	} else if($("#sq4").html() == ""){
		$("#sq4").html($("#sq3").html()).css('background-color', 'red');
		$("#sq3").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq4").click(function(e){
	if($("#sq1").html() == ""){
		$("#sq1").html($("#sq4").html()).css('background-color', 'red');
		$("#sq4").html("").css('background-color', 'black');
		moves();
	} else if($("#sq3").html() == ""){
		$("#sq3").html($("#sq4").html()).css('background-color', 'red');
		$("#sq4").html("").css('background-color', 'black');
		moves();
	} else if($("#sq5").html() == ""){
		$("#sq5").html($("#sq4").html()).css('background-color', 'red');
		$("#sq4").html("").css('background-color', 'black');
		moves();
	} else if($("#sq7").html() == ""){
		$("#sq7").html($("#sq4").html()).css('background-color', 'red');
		$("#sq4").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq5").click(function(e){
	if($("#sq2").html() == ""){
		$("#sq2").html($("#sq5").html()).css('background-color', 'red');
		$("#sq5").html("").css('background-color', 'black');
		moves();
	} else if($("#sq4").html() == ""){
		$("#sq4").html($("#sq5").html()).css('background-color', 'red');
		$("#sq5").html("").css('background-color', 'black');
		moves();
	} else if($("#sq8").html() == ""){
		$("#sq8").html($("#sq5").html()).css('background-color', 'red');
		$("#sq5").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq6").click(function(e){
	if($("#sq3").html() == ""){
		$("#sq3").html($("#sq6").html()).css('background-color', 'red');
		$("#sq6").html("").css('background-color', 'black');
		moves();
	} else if($("#sq7").html() == ""){
		$("#sq7").html($("#sq6").html()).css('background-color', 'red');
		$("#sq6").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq7").click(function(e){
	if($("#sq4").html() == ""){
		$("#sq4").html($("#sq7").html()).css('background-color', 'red');
		$("#sq7").html("").css('background-color', 'black');
		moves();
	} else if($("#sq6").html() == ""){
		$("#sq6").html($("#sq7").html()).css('background-color', 'red');
		$("#sq7").html("").css('background-color', 'black');
		moves();
	} else if($("#sq8").html() == ""){
		$("#sq8").html($("#sq7").html()).css('background-color', 'red');
		$("#sq7").html("").css('background-color', 'black');
		moves();
	}
});

$("#sq8").click(function(e){
	if($("#sq7").html() == ""){
		$("#sq7").html($("#sq8").html()).css('background-color', 'red');
		$("#sq8").html("").css('background-color', 'black');
		moves();
	} else if($("#sq5").html() == ""){
		$("#sq5").html($("#sq8").html()).css('background-color', 'red');
		$("#sq8").html("").css('background-color', 'black');
		moves();
	}
});

	
</script>

</body>
</html>
