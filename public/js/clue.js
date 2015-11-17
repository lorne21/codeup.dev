// Game Variables
var characters = [
	"Professor Plum",
	"Colonel Mustard",
	"Miss Scarlet",
	"Mr. Green",
	"Mrs. White",
	"Mrs. Peacock"
]

var weapons = [
	"Rope",
	"Pipe",
	"Knife",
	"Wrench",
	"Candlestick",
	"Pistol"
]

var cardRooms = [
	"Study",
	"Library",
	"Billiard",
	"Conservatory",
	"Hall",
	"Ballroom", 
	"Lounge",
	"Dining",
	"kitchen"
];

var playerArray = []; 
var winArray = [];

var Player = function(name, type) {
  this.name = name;
  this.type = type;
  this.cards = [];  
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
		var toCheck = characters[k];
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
		$('#suspects').append("<li><input type='checkbox' value='" + character + "'>" + character + "</li>");
	})
	weapons.forEach(function(weapon){
		$('#weapons').append("<li><input type='checkbox' value='" + weapon + "'>" + weapon + "</li>");
	})
	cardRooms.forEach(function(location){
		$('#locations').append("<li><input type='checkbox' value='" + location + "'>" + location + "</li>");
	})
}
// form to select:
// 1. number of players(3-6) x
// 2. player 1 Setup x
	// a) select character x
// 3. foreach through number of players and randomly select characters x
// 4. move player to appropriate start button
// 5. create decks x
// 6. create case file win array x
// 7. for each player deal cards from each deck to create player array x
// 8. load buttons on side to: 
	 // a) view cards x
	// b) view detective notebook x

// Gameplay

// 1. randomly decide who goes first
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
	$('#start').click(function(){
		$.each(characters, function(i, character){
			$("#characterSelect").append("<option>" + character + "</option>");
		})
		$('#newGame').modal('show')
	})
});

$(document).ready(function() {
	$("#begin").click(function(e) {
		var numPlayers = $('#playerSelect').val();
		var cpuNum = numPlayers -1;
		var playerName = $('#characterSelect').val();
		createUser(playerName);
		var cpuNames = getCpuPlayers(cpuNum, playerName);
		completePlayers(cpuNames);
		dealCards(characters);
		dealCards(weapons);
		dealCards(cardRooms);
		generateCheckbox(); 
		console.log(playerArray); 
		// insert function to create players passing in numPlayers
		e.preventDefault();
	});
});

