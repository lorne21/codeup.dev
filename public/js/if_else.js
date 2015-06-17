// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'yellow'; // TODO: change this to your favorite color from the list

console.log (color)

// TODO: Create a block of if/else statements to check for every color except indigo and violet.

if (color == 'red') {
	console.log ("I hate red and strawberries");
} else if (color == "orange") {
	console.log ("Orange is the color of a carrot")
} else if (color == "yellow") {
	console.log ("Yellow is the color of the sun")
} else if (color == "green") {
	console.log ("Green is the color of grass")
} else if (color == "blue") {
	console.log ("Blue is the mood I'm in")
} else if (color == "indigo" || "violet") {
	console.log ("I don't know anything of that color")
} 

// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
