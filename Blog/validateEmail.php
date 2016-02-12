<!--Checks if the e-mail input string is a valid Cornell e-mail address -->

<?php
	function validate_email($email){
		$match = "/^[a-z]{2,3}[0-9]{2,5}(@cornell.edu)$/";
		if(!preg_match($match,$email)){
			return false;
		}
		else {
			return true;
		}
	}
?>