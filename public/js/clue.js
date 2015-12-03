// Game Variables

var time = 200; 
var moves = 0; 
var classes = ['mustard', 'plum', 'scarlet', 'peacock', 'green', 'white'];
var excluder = $("#excluder");
var currentPlayer; 
var turn = 0; 

var characters = [
	{ 
		"name": "Professor Plum", 
		"imgPath": "/img/clue/plum2.jpg",
		"class": 'plum'
	},
	{ 
		"name": "Colonel Mustard", 
		"imgPath": "/img/clue/mustard2.jpg",
		"class": 'mustard'
	},
	{ 
		"name": "Miss Scarlet", 
		"imgPath": "/img/clue/scarlet1.jpg",
		"class": 'scarlet'
	},
	{ 
		"name": "Mr. Green", 
		"imgPath": "/img/clue/green1.jpg",
		"class": 'green'
	},
	{ 
		"name": "Mrs. White", 
		"imgPath": "/img/clue/white1.jpg",
		"class": 'white'
	},
	{ 
		"name": "Mrs. Peacock", 
		"imgPath": "/img/clue/peacock2.jpg",
		"class": 'peacock'
	}	
]

var weapons = [
	{ 
		"name": "Rope", 
		"imgPath": "/img/clue/rope.jpg"
	},
	{ 
		"name": "Pipe", 
		"imgPath": "/img/clue/pipe.jpg"
	},
	{ 
		"name": "Knife", 
		"imgPath": "/img/clue/knife.jpg"
	},
	{ 
		"name": "Wrench", 
		"imgPath": "/img/clue/wrench.jpg"
	},
	{ 
		"name": "Candlestick", 
		"imgPath": "/img/clue/candlestick.jpg"
	},
	{ 
		"name": "Pistol", 
		"imgPath": "/img/clue/pistol.jpg"
	}	
]

var cardRooms = [
	{ 
		"name": "Study", 
		"imgPath": "/img/clue/study1.jpg",
		"secret": "studykitchen"
	},
	{ 
		"name": "Library", 
		"imgPath": "/img/clue/library2.jpg"
	},
	{ 
		"name": "Billiard", 
		"imgPath": "/img/clue/billiard.jpg"
	},
	{ 
		"name": "Conservatory", 
		"imgPath": "/img/clue/conservatory.jpg",
		"secret": "conservatorylounge"
	},
	{ 
		"name": "Hall", 
		"imgPath": "/img/clue/hall.jpg"
	},
	{ 
		"name": "Ballroom", 
		"imgPath": "/img/clue/ballroom2.jpg"
	},
	{ 
		"name": "Lounge", 
		"imgPath": "/img/clue/lounge.jpg",
		"secret": "conservatorylounge"
	},
	{ 
		"name": "Dining", 
		"imgPath": "/img/clue/dining2.jpg"
	},
	{ 
		"name": "Kitchen", 
		"imgPath": "/img/clue/kitchen.jpg",
		"secret": "studykitchen"
	}	
];

var playerArray = []; 
var winArray = [];
var guessArray = []; 


var Player = function(name, type) {
  this.name = name;
  this.type = type; 
  this.cards = [];  
  this.oppcards = []; 
  this.active = false;  
  this.hasRolled = false; 
  this.inRoom = ""; 
}

// this function shuffles an array
function shuffle(o){
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}

// function creates user player
function createUser(name, array){
	playerArray.push(new Player(name, "user"));
}

// function returns an array of random characters for cpu to play
function getCpuPlayers(number, name){
	var cpuArray = []; 
	var k = 0
	shuffle(characters);
	do{
		var toCheck = characters[k].name;
		if (name != toCheck){
			cpuArray.push(toCheck)
			k++;
		} else {
			k++;
		}
	}
	while(cpuArray.length < number);
	return cpuArray;
}

function completePlayers(array){
	array.forEach(function(charName) {
		playerArray.push(new Player(charName, "cpu"));
	})
}

function dealCards(array){
	shuffle(array);
	var forWin = array.shift();
	winArray.push(forWin); 
	var m = 0; 	
	array.forEach(function(card){
		if (m == playerArray.length){
			m = 0; 
		}
		var player = playerArray[m];
		var addTo = player.cards; 
		addTo.push(card);
		m++; 
	})
}

function generateCheckbox(){
	characters.forEach(function(character){
		$('#suspects').append("<li><input type='checkbox' disabled ='true' value='" + character.name + "'>" + character.name + "</li>");
	})
	weapons.forEach(function(weapon){
		$('#weapons').append("<li><input type='checkbox' disabled ='true' value='" + weapon.name + "'>" + weapon.name + "</li>");
	})
	cardRooms.forEach(function(location){
		$('#locations').append("<li><input type='checkbox' disabled ='true' value='" + location.name + "'>" + location.name + "</li>");
	})
}

function checkCards(){
	var huplay = playerArray[0];
	var checkboxes = $('input'); 
	var hucards = huplay.cards;
	var oppcards = huplay.oppcards; 
	hucards.forEach(function(hucard){ 
		$('input').each(function(i, checkbox){
			var boxval = checkbox.value;  
			if (hucard.name == boxval){
				checkbox.checked = true; 
				var parent = checkbox.parentElement;
				parent.style.color = 'green';  
			}
		})
	})
	oppcards.forEach(function(oppcard){ 
		$('input').each(function(i, checkbox){
			var boxval = checkbox.value;  
			if (oppcard.name == boxval){
				var oppParent = checkbox.parentElement;
				oppParent.style.color = 'orange';  
			}
		})
	})

}

function startSquares(){
	var starts = $('.start');
	var b = 0
	shuffle(starts); 
	playerArray.forEach(function(player){
		var one = starts[b];
		var two = "#" + $(one).attr('id'); 
		player.startSquare = two; 
		b++; 
	})
	startColors();
}

function startColors(){
	playerArray.forEach(function(player){
		console.log(player);
		switch(player.name){
			case 'Professor Plum': 
				$(player.startSquare).addClass('plum');
				player.color = 'plum'; 
				break;
			case 'Colonel Mustard':
				$(player.startSquare).addClass('mustard');
				player.color = 'mustard'; 
				break;
			case "Miss Scarlet":
				$(player.startSquare).addClass('scarlet');
				player.color = 'scarlet'; 
				break;
			case "Mr. Green":
				$(player.startSquare).addClass('green');
				player.color = 'green';
				break;
			case "Mrs. White":
				$(player.startSquare).addClass('white');
				player.color = 'white'; 
				break;
			case "Mrs. Peacock":
				$(player.startSquare).addClass('peacock');
				player.color = 'peacock'; 
				break; 
		}
	})
}

function activeStart(){
	currentPlayer = playerArray[turn];
	var toActive = currentPlayer.startSquare;
	currentPlayer.active = true; 
	$(toActive).addClass("activePlayer");
}

function displayRoom(){
	// takes in location of active player, grabs pertinent room, displays proper image
}


// function room(){
// 	// $('#excluder').show();
// 	// $('#overlay').show(); 
// 	// INSERT DISPLAY FUNCTION here
// 	currentPlayer.inRoom = true; 
// 	if (currentPlayer.hasRolled == true && currentPlayer.type == 'user'){
// 		// you can make suggestion or accusation
// 	}

// }

function suggestion(){
	var charChoice = $('#charsugg').val();
	var weapChoice = $('#weapsugg').val();
	var roomChoice = $('#roomsugg').val();
	var suggArray = [charChoice, weapChoice, roomChoice];


}

// function suggestionCheck(choice){ 
// 	playerArray.forEach(function(player){
// 		if (!player.active){ 
// 			var playCards = player.cards;
// 			playCards.forEach(function(card){
// 				if(choice )
// 			}) 

// 		}
// 	})
// }

function getSuggCats(){
	var huplayer = playerArray[0];
	huplayer.allcards = huplayer.cards.concat(huplayer.oppcards);
	var huCards = huplayer.allcards;
	huCards.forEach(function(card){
		if ($.inArray(card, characters) != -1){
			$('#suggChar').append("<option>" + card.name + "</option>"); 
		}
		if ($.inArray(card, weapons) != -1){
			$('#suggWeap').append("<option>" + card.name + "</option>"); 
		}		
	})
	$('#suggRoom').append("<option>" + huplayer.inRoom + "</option>")
}


function rollTab(){
	$('.tabs li').removeClass('current');
	$('section').removeClass('current');
	$('#t-8').addClass('current');
	$('#s-8').addClass('current');
}

// this logs the various events of the game
function logThis(play){
	if (play == 'new'){
		var opponents = []; 
		playerArray.forEach(function(player){
			if (player.type == 'user'){
				$('#gameLog').append("<p>You are " + player.name + ".</p>");
			} else {
				opponents.push(player.name); 
			}
		})
		var lastName = opponents.pop();
		var oppString = opponents.join(", ");
		$('#gameLog').append("<p>Your opponents are " + oppString + " and " + lastName + ".</p>"); 
	} else if (play == 'dice'){
		 playerArray.forEach(function(player){
			if (player.active == true){
				$('#gameLog').append("<p>" + player.name + " rolled a " + $('#movesAvail').html() + ".</p>");
			} 
		})
	} else if (play == 'enter'){
		var enteredRoom; 
		var where = $('.activePlayer').attr('class');
		var whereArray = where.split(" "); 
		rooms.forEach(function(room){
			if ($.inArray(room, whereArray) != -1){
				enteredRoom = room; 
			}
		})
		playerArray.forEach(function(player){
			if (player.active == true){
				$('#gameLog').append("<p>" + player.name + " entered the " + enteredRoom + ".</p>");
				player.inRoom = enteredRoom; 
			} 
		})

	}

}
// Gameplay

//create function to check location of player: run diff functions based on that

	// roll dice x
	// track player squares moved x
	// gamelog update x
		// make log functions and styles
		// 	one for player turn
		// 	one for player die roll x
		// 	one for player enter room x
		// 	one for player use secret passage
		// 	one for player suggestion
		// 	one for player accusation
	// store dice value in movesAllowed x 
	// if movesAllowed > 0....
		// must run a check
			// if player is in hallway, turn ends, squares moved = 0
			// if player enters door, moves = 0, inroom class
				//if squares moved > 0, run inRoom function
			// if player is inRoom and wants to leave
				// create function to determine doors if multiple
				// ask what door to leave
				// move active player to that door
				// roll dice
	//if player is inRoom to start turn
		//ask if they want to leave
		//if there's a secret door and they have said door in array, ask if they 
		// want to use
			// if yes, re-run inRoom function at new location

// 1. randomly decide who goes first
		// - load players onto start buttons
// 2. if turn = activeplayer then run playerturn
// 3. if player not inRoom, load button to roll dice, remove button. else,
	// load button to use secret passage if exists, begin room functionality
// 4. if dice, moves allowed = dice total
// 5. move character one space per move
// 6. if player is still in hallway, load button to end turn
// 7. if player enters a door, moves = 0, begin room functionality
// 8. if inRoom: 
	// a) load buttons to make suggestion, make accusation, end turn

// 9. Suggestion: 
	// a) select weapon, room will be inRoom class, select character
	// b) on submit, for each player, if they have one or more of the cards
	// pick random card and show to active player
	// c) push new card into card array and update detective notebook
			// -cpu will need its own array for a checklist. need to make function for it
	// d) at beginning, remove suggestion button

// 10. Accusation:
	// a) select weapon, room, character
	// b) on submit, check if accArray == winArray
	// c) if right, game win. wrong, game lose
	// d) load new game button

// Challenging Part
// 1. Making logic for computer move
// 2. pick room
// 3. get door (if more than one get closest)
// 4. determine if it's less moves to go horizontal or vertical
	

// Game Setup
$(document).ready(function() {
	generateCheckbox();
	$('#movesAvail').html(moves); 
	$('#start').click(function(){
		$.each(characters, function(i, character){
			$("#characterSelect").append("<option>" + character.name + "</option>");
		})
		$('#newGame').modal('show')
	})
});

$(document).ready(function() {
	$("#begin").click(function(e) {
		var numPlayers = $('#playerSelect').val();
		var playerName = $('#characterSelect').val();
		var cpuNum = numPlayers -1;
		createUser(playerName);
		var cpuNames = getCpuPlayers(cpuNum, playerName);
		completePlayers(cpuNames);
		startSquares();
		dealCards(characters);
		dealCards(weapons);
		dealCards(cardRooms);
		checkCards();
		activeStart();  
		// console.log(playerArray); 
		$("#t-1").unbind('click');
		logThis('new');
		rollTab();
		e.preventDefault();
	});
});

$("#sugg").click(function(e) {
	getSuggCats();
	$('#sugAcc').modal('show');
})

// Tab Handlers
$('.tabs li').click(function tabbers(){
  id = ($(this).attr('id')).split('-');
  $('.tabs li').removeClass('current');
  $('section').removeClass('current');
  $('#t-'+id[1]).addClass('current');
  $('#s-'+id[1]).addClass('current');
});

// Movement Handlers
function moveSquare(direction, current, color){
	if($(direction).hasClass('hallway')){
		$(current).removeClass("activePlayer");
    	$(direction).addClass("activePlayer");
    	$(current).removeClass(color);
    	$(direction).addClass(color);
	} else if ($(direction).hasClass('doors')){
		$(current).removeClass("activePlayer");
    	$(direction).addClass("activePlayer"); 
    	$(current).removeClass(color);
    	$(direction).addClass(color);
    	setTimeout(function(){
    		$(direction).animate({
    			"background-color": "#ADD8E6",
    			}, "slow")
    		moves = 0; 
    		$('#movesAvail').html(moves);
    	},500)
    	logThis('enter');
    	// setTimeout(function(){
    	// 	room();
    	// },2000) 
		// insert function to handle room here
	}
}

function getCharClass(square){
	var toChange; 
	classes.forEach(function(charClass){
		if($(square).hasClass(charClass)){
			toChange = charClass; 
		}
	})
	return toChange;
}

$(document).keydown(function(e){ 
    var active = $('.activePlayer'); 
    var activeNum = $(active).data('id');
    var activeSq = "#sq" + activeNum;
    var charColor = getCharClass(activeSq); 
    var left = "#sq" + (activeNum - 1); 
    var right = "#sq" + (activeNum + 1);
    var up =  "#sq" + (activeNum - 24);
    var down = "#sq" + (activeNum + 24);
    if (moves > 0){	
		if (e.keyCode == 37) { // left
			moveSquare($(left), active, charColor)
			moves--;
			$('#movesAvail').html(moves); 
			e.preventDefault();
		} else if (e.keyCode == 39) { // right
		    moveSquare($(right), active, charColor)
		    moves--;
		    $('#movesAvail').html(moves);
			e.preventDefault();
		} else if (e.keyCode == 38) { // up
		    moveSquare($(up), active, charColor)
		    moves--;
		    $('#movesAvail').html(moves);
			e.preventDefault();
		} else if (e.keyCode == 40) { // down
		    moveSquare($(down), active, charColor)
		    moves--;
		    $('#movesAvail').html(moves);
			e.preventDefault();
		}
    }
})

//this rolls the dice FOR USER ONLY. MODIFY TO USE DICE FACE HTML ENTITIES
	
$('#roll').click(function sides(){	
	if (currentPlayer.hasRolled == false){
		setTimeout(function(){
			var rand = Math.floor(Math.random()*6) + 1;
			var rand2 = Math.floor(Math.random()*6) + 1;
			$('#die1').html(rand);
			$('#die2').html(rand2); 
			if (time < 800){
				time += 71; 
				sides(); 
			} else if (time > 800){
				time = 200;
				var rolled1 = parseInt($('#die1').html()); 
				var rolled2 = parseInt($('#die2').html());
				moves = rolled1 + rolled2; 
				$('#movesAvail').html(moves);
				currentPlayer.hasRolled = true; 
				logThis('dice');
			}
		}, time)
	}
})
// End Movement Handlers


// room searcher
$('#overlay').mousemove(function(e) {
  var x = (e.pageX - 785);
  var y = (e.pageY - 205);
  $(excluder).css({
  	"transform": " translate("+x+"px, " + y + "px)",
  	"background-position" : ((x > 0)?'-':'') + Math.abs(x) + "px " + ((y > 0)?'-':'')+ Math.abs(y) + "px"
  });
})
