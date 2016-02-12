<!DOCTYPE html>

<html>

<head>
	<meta charset = "UTF-8">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<!--Contact page: Includes my basic contact information as well as a form to send me an e-mail -->

<body>
	<div id="Nav">
		<?php include 'displayNav.php'; ?>
	</div>
	<h1 class="intro">Contact Information</h1>
	<ul>
		<li>Phone: 203-505-9696</li>
		<li>E-mail: krc78@cornell.edu</li>
		<li>118 Cook Street Room 1, Ithaca, NY, 14850</li>
	</ul>

	<!--Adds a form to send me (keelan32@live.com) a message
	Includes inputs for Name, e-mail, identity, and message-->

	<form method="post">
		Send me a message:
		<br>
		<br>
		<label class="formLabel">Name (Required) </label>
		<br>
		<input type="text" name="Name">
		<br>
		<label class="formLabel">E-mail (Required, must be a Cornell e-mail) </label>
		<br>
		<input type="text" name="email">
		<br>
		<label class="formLabel">Choose one: Who are you? (Required) </label>
		<br>
		<select name="identity">
			<?php
				$select_options = array('Undergraduate Student',
					'Graduate Student','Professor',
					'Kryptonian Battle Walrus',
					'Other (No need to specify)');
				foreach ($select_options as $int => $person){
					echo "<option value=$int>$person</option>";
				}
			?>
		</select>
		<br>
		<label class="formLabel">Message (Required) </label>
		<br>
		<textarea name="textAreaMessage" rows="8" cols="30"></textarea>
		<br>
		<input type="submit" name = "submit" value="Submit">

		<!--Checks if required input fields are empty
		 (or in the case of e-mail, invalid Cornell e-mail) when user clicks submit. If 
		all required fields are filled, sends me an e-mail-->
		
		<?php include 'validateEmail.php';
			$message = "";
			$received = isset($_POST["textAreaMessage"])? $_POST["textAreaMessage"] : "";
			$name = isset($_POST["Name"])? $_POST["Name"] : "";
			$email = isset($_POST["email"])? $_POST["email"] : "";
			$select_option = isset($_POST["identity"])? $_POST["identity"] : "";
			if(isset($_POST["submit"]) && (empty($name) || !preg_match("/^[A-Za-z ]*/",$name))){
				$message = "You must enter a valid name to submit!";
			}
			else if (isset($_POST["submit"]) && !validate_email($email)) {
				$message = "You must enter a valid Cornell e-mail address to submit!";
			}
			else if (isset($_POST["submit"]) && empty($received)){
				$message = "You must enter a message to submit!";
			}
			else if(isset($_POST["submit"])){
				mail("keelan32@live.com","Blog E-mail from $name at $email, a $select_option",$received);
				$message = "Mail sent! Thank you, $name.";
			}
			print("<p>$message</p>");
		?>
	</form>
</body>
</html>