var turns = 0; 
var win = 0; 
var winTotal = 0; 
var level;

// this function handles the start/restart

$('#start').click(function(e){
	coinFlip(); 
	$('#start').hide();
	$('#replay').show(); 
});

$('#replay').click(function(e){
	turns = 0;
	win = 0; 
	$('.square').removeClass('activePlayer');
	$('.square').removeClass('activeComp');
	coinFlip();
});

// these handle the Difficulty
$('#easy').click(function(e){
	level = $(this).data('level');
	console.log(level);
});

$('#medium').click(function(e){
	level = $(this).data('level');
	console.log(level);
});
	
// this function handles the coin flip
function coinFlip(){
	var rand = Math.floor(Math.random()*2);
	if (rand == 0){
		alert("You play first! Select a square to continue.")
	} else {
		alert("Computer plays first!");
		setTimeout(cpuMove, 1000);
	}
}

// this function animates the square.    
function animateCompSquare(id){
	var that = $("#" + id);
	if (that.hasClass('activePlayer') || that.hasClass('activeComp')){
		cpuMove();
	} else {
		that.addClass('activeComp');
		turns += 1; 
		// console.log(turns);
	}
}
function animateCompSquare2(id){
	var that = $(id);
	if (that.hasClass('activePlayer') || that.hasClass('activeComp')){
		cpuMove();
	} else {
		that.addClass('activeComp');
		turns += 1; 
		// console.log(turns);
	}
}

// this function handles the user turn
$('.square').click(function(e){
	gameChecks();
	$(this).addClass('activePlayer');
	turns += 1;
	setTimeout(cpuMove, 1000); 
	
});

// this function handles cpu turn
function cpuMove(){
	gameChecks();
	var sqHole = $('.square')
	var rand = Math.floor(Math.random()*9);
	var toAnimate = sqHole[rand];
	// console.log(rand);
	var id = toAnimate.getAttribute('id');
	if(win == 0){
		if(level == 'easy'){
			animateCompSquare(id);
			gameChecks(); 
		} else if (level == 'medium'){
			cpuCheck();
			gameChecks();
		}
	}
}

// these functions handle the cpu difficulty check
function cpuCheck(){
	var sqHole = $('.square')
	var rand = Math.floor(Math.random()*9);
	var toAnimate = sqHole[rand];
	// console.log(rand);
	var id = toAnimate.getAttribute('id');
	if ($("#sq0").hasClass('activePlayer') &&
		 $("#sq1").hasClass('activePlayer')){
		 	animateCompSquare2('#sq2');
	} else if ($("#sq1").hasClass('activePlayer') &&
		 $("#sq2").hasClass('activePlayer')){
		 	animateCompSquare2('#sq0');
	} else if ($("#sq3").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer')){
		 	animateCompSquare2('#sq5');
	} else if ($("#sq4").hasClass('activePlayer') &&
		 $("#sq5").hasClass('activePlayer')){
		 	animateCompSquare2('#sq3');
	} else if ($("#sq6").hasClass('activePlayer') &&
		 $("#sq7").hasClass('activePlayer')){
		 	animateCompSquare2('#sq8');
	} else if ($("#sq7").hasClass('activePlayer') &&
		 $("#sq8").hasClass('activePlayer')){
		 	animateCompSquare2('#sq6');
	} else if ($("#sq0").hasClass('activePlayer') &&
		 $("#sq3").hasClass('activePlayer')){
		 	animateCompSquare2('#sq6');
	} else if ($("#sq3").hasClass('activePlayer') &&
		 $("#sq6").hasClass('activePlayer')){
		 	animateCompSquare2('#sq0');
	} else if ($("#sq1").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer')){
		 	animateCompSquare2('#sq7');
	} else if ($("#sq7").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer')){
		 	animateCompSquare2('#sq1');
	} else if ($("#sq2").hasClass('activePlayer') &&
		 $("#sq5").hasClass('activePlayer')){
		 	animateCompSquare2('#sq8');
	} else if ($("#sq5").hasClass('activePlayer') &&
		 $("#sq8").hasClass('activePlayer')){
		 	animateCompSquare2('#sq2');
	} else if ($("#sq0").hasClass('activePlayer') &&
		 $("#sq1").hasClass('activePlayer')){
		 	animateCompSquare2('#sq2');
	} else if ($("#sq0").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer')){
		 	animateCompSquare2('#sq8');
	} else if ($("#sq4").hasClass('activePlayer') &&
		 $("#sq8").hasClass('activePlayer')){
		 	animateCompSquare2('#sq0');
	} else if ($("#sq2").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer')){
		 	animateCompSquare2('#sq6');
	} else if ($("#sq4").hasClass('activePlayer') &&
		 $("#sq6").hasClass('activePlayer')){
		 	animateCompSquare2('#sq2');
	} else {
		animateCompSquare(id);
	}
}		



// these functions handle the game win/loss checks
function checkHorizontal(){
	if (($("#sq0").hasClass('activePlayer') &&
		 $("#sq1").hasClass('activePlayer') &&
		 $("#sq2").hasClass('activePlayer')) || 
		($("#sq3").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer') &&
		 $("#sq5").hasClass('activePlayer')) || 
		($("#sq6").hasClass('activePlayer') &&
		 $("#sq7").hasClass('activePlayer') &&
		 $("#sq8").hasClass('activePlayer'))){
		win = 1; 
		alert("You Win!!! G Status"); 
	} else if (($("#sq0").hasClass('activeComp') &&
		 $("#sq1").hasClass('activeComp') &&
		 $("#sq2").hasClass('activeComp')) || 
		($("#sq3").hasClass('activeComp') &&
		 $("#sq4").hasClass('activeComp') &&
		 $("#sq5").hasClass('activeComp')) || 
		($("#sq6").hasClass('activeComp') &&
		 $("#sq7").hasClass('activeComp') &&
		 $("#sq8").hasClass('activeComp'))){
		win = 1;
		alert("Computer Wins!! Loser");
	}
}

function checkVertical(){
	if (($("#sq0").hasClass('activePlayer') &&
		 $("#sq3").hasClass('activePlayer') &&
		 $("#sq6").hasClass('activePlayer')) || 
		($("#sq1").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer') &&
		 $("#sq7").hasClass('activePlayer')) || 
		($("#sq2").hasClass('activePlayer') &&
		 $("#sq5").hasClass('activePlayer') &&
		 $("#sq8").hasClass('activePlayer'))){
		win = 1;
		alert("You Win!!! G Status"); 
	} else if (($("#sq0").hasClass('activeComp') &&
		 $("#sq3").hasClass('activeComp') &&
		 $("#sq6").hasClass('activeComp')) || 
		($("#sq1").hasClass('activeComp') &&
		 $("#sq4").hasClass('activeComp') &&
		 $("#sq7").hasClass('activeComp')) || 
		($("#sq2").hasClass('activeComp') &&
		 $("#sq5").hasClass('activeComp') &&
		 $("#sq8").hasClass('activeComp'))){
		win = 1; 
		alert("Computer Wins!! Loser");
	}
}

function checkDiagonal(){
	if (($("#sq0").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer') &&
		 $("#sq8").hasClass('activePlayer')) || 
		($("#sq2").hasClass('activePlayer') &&
		 $("#sq4").hasClass('activePlayer') &&
		 $("#sq6").hasClass('activePlayer'))){
		win = 1;
		alert("You Win!!! G Status"); 
	} else if (($("#sq0").hasClass('activeComp') &&
		 $("#sq4").hasClass('activeComp') &&
		 $("#sq8").hasClass('activeComp')) || 
		($("#sq2").hasClass('activeComp') &&
		 $("#sq4").hasClass('activeComp') &&
		 $("#sq6").hasClass('activeComp'))){
		win = 1;
		alert("Computer Wins!! Loser");
	}
}

function checkTurn(){
	if (turns == 9){
		win = 1;
		alert('This match was a draw');
	}
}

function gameChecks(){
	checkHorizontal();
	checkVertical(); 
	checkDiagonal();
	checkTurn(); 
}