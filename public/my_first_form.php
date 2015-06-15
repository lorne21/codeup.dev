<?php
  var_dump($_GET);
  var_dump($_POST);
?>

<html>

<head>
	<title>My First Form</title>

	<meta charset="utf-8">
</head>

<body>

	<section class="form">
		
		<h2>User Login</h2>
	
			<form method="POST" action="/my_first_form.php">
    	
    	    	<label for="username">Username</label>
    	    	<input id="username" name="username" type="text" placeholder="username" autofocus required>
    			
    	    	<label for="password">Password</label>
    	    	<input id="password" name="password" type="password" placeholder="password" required>
    			
    	    	<button type="submit" name="submit_button">Log in now</button>
    		
			</form>
	</section>

	<section class ="form">

		<h2>Compose an Email</h2>

			<form method="POST" action="my_first_form.php">
	
				<label for="to">To</label>
				<input id="to" name="to" type="text" placeholder="To">
	
				<label for="from">From</label>
				<input id="from" name="from" type="text" placeholder="From">
	
				<label for="subject">Subject</label>
				<input id="subject" name="subject" type="text" placeholder="Subject">

				<p>
				<textarea id="email_body" name="email_body" rows="5" cols="40" placeholder="Content"></textarea>
				</p>

				
				<input type="checkbox" name="sent folder" type="sent folder" value="yes" checked>
				<label for="checkbox">Would you like to save a copy of this email to your Sent Folder</label>
				<br>
				<button type="submit" name="send button">Send</button>

			</form>

	</section>

	<section class="form">

		<h2>Multiple Choice Test</h2>

			<form method="POST" action="my_first_form.php">

				<p>What are your favorite colors?</p>
				
					<label><input type="checkbox" id="blue" name="os[]" value="blue">Blue</label>
					<label><input type="checkbox" id="red" name="os[]" value="red">Red</label>
				 	<label><input type="checkbox" id="black" name="os[]" value="black">Black</label>
				 	<label><input type="checkbox" id="purple" name="os[]" value="purple">Purple</label>
				 	<label><input type="checkbox" id="green" name="os[]" value="green">Green</label>
				 	<p>
				 	<button>Submit</button>
				 	</p>

			</form>

	</section>

	<section class="form">

			<form method="POST" action="my_first_form.php">

				<p>What city am I from?</p>
				
					<label><input type="radio" name="q1" value="Oakland">Oakland</label>
					<label><input type="radio" name="q1" value="New York">New York</label>
				 	<label><input type="radio" name="q1" value="Chicago">Chicago</label>
				 	<p>
				 	<button>Submit</button>
				 	</p>

			</form>

	</section>
	
	<section class="form">

		<form method="POST" action="my_first_form.php">

			<label for="Date">Would you like to go on a date?</label>
				<select id="Date?" name="Date?">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
				<p>
				<button>Submit</button>
				</p>
		</form>


	</section>
</body>

</html>		