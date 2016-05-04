<html>
<head>
	<title>Form Validation</title>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<?php
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["name"])){
				$nameErr = "Name is required.";
			}else{
				$name = test_input($_POST["name"]);
				//check if the name only contains letter and white space
				if(!preg_match("/^[a-zA-Z ]*$/",$name)){
					$nameErr = "Only letters and white space allowed"; 
				}
			}
			
			if(empty($_POST["email"])){
				$emailErr  = "Email is required.";
			}else{
				$email = test_input($_POST["email"]);
				//check if the email address is well formed
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$emailErr = "Invalid email format.";
				}
			}
			
			if(empty($_POST["website"])){
				$website = "";
			}else{
				$website = test_input($_POST["website"]);
				//check if URL address syntax is valid (this regular expression also allows dashes in the URL)
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
				   $websiteErr = "Invalid URL"; 
				}
			}
			
			if(empty($_POST["comment"])){
				$comment = "";
			}else{
				$comment = test_input($_POST["comment"]);
			}
			
			if(empty($_POST["gender"])){
				$genderErr = "Gender is required";
			}else{
				$gender = test_input($_POST["gender"]);
			}
		}
		
		
		function test_input($data){
			$data = trim($data); //Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
			$data = stripslashes($data); //Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	
	<h2>PHP Form Validation Example</h2>
	<p><span class="error">* required field.</span></p>