var wordArray; 
var checkWord; 
var games = 0; 	
// this function grabs a random word from urban dictionary
function word(){
	$.ajax("/data/urban2.json").done(function(data){
		var urban = data.results.collection1;
        var rand = Math.floor(Math.random()*urban.length);
        // console.log(urban.length);
        var randWord = (urban[rand]);
        wordArray = [randWord.word.text, randWord.description, randWord.example];
        createGuessBlocks(wordArray);
        displayBox(wordArray);
    }).fail(function(){
    	console.log('unsuccessful');
    })
}

// function to generate letters to fill in
function createGuessBlocks(array){
	var gameWord = array[0].split("");

	$.each(gameWord, function(i, gameWord){
		// console.log(gameWord);
		if(gameWord == "-"){
			$("#right").append("<a class='box nonLetter' href='#'>-</a>");
		} else if (gameWord == " "){
			$("#right").append("<a class='box blankLetter' href='#'></a>");
		} else {
			$("#right").append("<a class='box guessLetter' href='#' data-letter=" + gameWord + "></a>");
		}
    }); 
	console.log(gameWord);
}

// function to display word description and example
function displayBox(array){
	$('#word').html(array[0]);
	$('#definition').html("Definition: " + array[1]);
	$('#usecase').html(array[2]);
}
// function to add click listeners to all letters
$(".letter").click(function(e){
	e.preventDefault();
	var inside = $(this).text();
	var btnLetter = $(this);
	// console.log(inside);
	checkLetter(inside, btnLetter);
	gameWin();
})

// function to check letter
function checkLetter(string, element){
	var toCheck = $('.guessLetter')
	var arrayCheck = [];
	$.each(toCheck, function(i, toCheck){
		arrayCheck.push($(toCheck).data('letter').toUpperCase());
	}); 
	// console.log(arrayCheck);
	if ($.inArray(string, arrayCheck) != -1){
		$(element).addClass('righton');
		$.each(toCheck, function(i, toCheck){
			var data = $(toCheck).data('letter').toUpperCase();
			if (string == data){
				$(toCheck).html(data);
				$(toCheck).addClass('filled')
			} 
		});
		// insert game end function here 
	} else {
		$(element).addClass('wrong');
		// insert function for hangman here
		hangman(); 
	}
}
// function to create hangman
function hangman(){
	var length = $('.wrong').length; 
	$('#face').css('background', 'url(/img/face' + length + '.png) center');
	$('#face').css('background-size', 'cover');
	if (length == 6){
		$('#message').html('YOU LOSE');
		if ($('#message').hasClass('win')){
			$('#message').removeClass('win');
		}
		$('#message').addClass('lose') 
		$('#defbox').slideDown("slow");
		$('.play').slideDown('slow'); 
		// function for game end here
	} 
}

$('.play').click(function(e){
	e.preventDefault();
	$('.play').slideUp('slow');
	$('.play').html('PLAY AGAIN');
	if (games == 0){
		// display letters
		var letters = $('.letter'); 
		$.each(letters, function(i, letter){
			$(letter).animate({
				opacity: 1 
			}, 2000);
		});
		// display noose
		$('#noose').slideDown("slow");
		// create word
		word();
		games++; 
		
	} else if (games > 0){
		gameReset();
		setTimeout(function(){
			word();	
		}, 1000); 

	}

})

function gameReset(){
	var resetLetter = $('.letter');
	var resetGuess = $('.guessLetter');
	var resetBlank = $('.blankLetter');
	var resetDash = $('.nonLetter');
	$('#defbox').slideUp("slow");
	$.each(resetGuess, function(i, guess){
		$(guess).remove(); 
	})
	$.each(resetBlank, function(i, blank){
		$(blank).remove(); 
	})
	$.each(resetDash, function(i, dash){
		$(dash).remove(); 
	})  
	$.each(resetLetter, function(i, letter){
		if ($(letter).hasClass('righton')){
			$(letter).removeClass('righton');
		} else if ($(letter).hasClass('wrong')){
			$(letter).removeClass('wrong');
		}
	});
	$('#face').css('background', '');


}

// function to check game win
function gameWin(){
	var win = $('.guessLetter');
	var wordWin = $('.guessLetter').length;
	var wordCheck = 0;
	$.each(win, function(i, win){
		if($(win).hasClass('filled')){
			wordCheck += 1; 
		}

	}) 
	// console.log(wordCheck);
	if (wordWin == wordCheck){
		$('#message').html('YOU WIN!')
		if ($('#message').hasClass('lose')){
			$('#message').removeClass('lose');
		}
		$('#message').addClass('win') 
		$('#defbox').slideDown("slow");
		$('.play').slideDown("slow");
	}

}

// track wins and losses




