<!DOCTYPE html>

<html>
<head>
	<meta charset = "UTF-8">
	<title>Projects</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<!--Projects page: Includes descriptions and relevant photos of projects I'm currently working on
#TODO: update with actual projects -->

<body>
	<div id="Nav">
		<?php include 'displayNav.php'; ?>
	</div>
	<h1 class="intro">Projects</h1>
	<p>Currently no projects here, check back later!</p>
	<p>Some project topics that interest me involve Android app development and data mining on large data sets.</p>
	<p>If you have any ideas about cool projects that fit my skillset, please let me know in the message below. Also include your 
		e-mail so I can discuss the project logistics with you. </p>

	<!--Creates a form to send me (keelan32@live.com) a message about project ideas.
	Includes e-mail (must be a Cornell email) and message fields -->

	<form method="post" id="projectForm">
		<label class="formLabel">Please write your Cornell e-mail address here. </label>
		<br>
		<input type="text" name="email">
		<br>
		<label class="formLabel">Now, write your project proposal.</label>
		<br>
		<textarea name="textAreaMessage" rows="8" cols="30"></textarea>
		<br>
		<input type="submit" name="submit" value="Submit">

		<!--Checks if required fields are empty are in the case of email have invalid input -->

		<?php include 'validateEmail.php';
			$message = "";
			$email = isset($_POST["email"])? $_POST["email"] : "";
			$proposal = isset($_POST["textAreaMessage"])? $_POST["textAreaMessage"] : "";
			if (isset($_POST["submit"]) && !validate_email($email)) {
				$message = "You must enter a valid Cornell email address (for example, abc123@cornell.edu)";
			}
			else if (isset($_POST["submit"]) && empty($proposal)) {
				$message = "You must enter a message to submit!";
			}
			else if (isset($_POST["submit"])) {
				mail("keelan32@live.com","Project Proposal from $email",$proposal);
				$message = "Thank you for your ideas!";
			}
			print('<p id="projectMessage">'.$message.'</p>');
		?>
	</form>
	<figure id="projectpic">
		<img src="http://www.edtechguide.info/wp-content/uploads/2015/06/1160562_32750485.jpg" id = "glorious">
		<figcaption>Image found at http://www.edtechguide.info/wp-content/uploads/2015/06/1160562_32750485.jpg</figcaption>
	</figure>
</body>

</html>