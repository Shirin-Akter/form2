<?php include("db_connect.php")?>

<?php 
	$allowedExts = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png");
	$extension = end(explode(".", $_FILES["fileToUpload"]["tmp_name"]));
	if (($_FILES["fileToUpload"]["type"] == "application/pdf")
	|| ($_FILES["fileToUpload"]["type"] == "application/msword")
	|| ($_FILES["fileToUpload"]["type"] == "image/gif")
	|| ($_FILES["fileToUpload"]["type"] == "image/jpeg")
	|| ($_FILES["fileToUpload"]["type"] == "image/jpg")
	|| ($_FILES["fileToUpload"]["type"] == "image/pjpeg")
	|| ($_FILES["fileToUpload"]["type"] == "image/x-png")
	|| ($_FILES["fileToUpload"]["type"] == "image/png")
	&& in_array($extension, $allowedExts)){
		if ($_FILES["fileToUpload"]["error"] > 0){
			echo "Return Code: " . $_FILES["fileToUpload"]["error"] . "<br>";
		}else{
			echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br>";
			echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
			echo "Size: " . ($_FILES["fileToUpload"]["size"] / 200000) . " kB<br>";
			echo "Temp file: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>";

			if (file_exists("uploads/" . $_FILES["fileToUpload"]["name"])){
			  echo $_FILES["fileToUpload"]["name"] . " already exists. ";
			}else{
			  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
			  "uploads/" . $_FILES["fileToUpload"]["name"]);
			  echo "Stored in: " . "uploads/" . $_FILES["fileToUpload"]["name"];
			  $file_path = "uploads/" . $_FILES["fileToUpload"]["name"];
			}
		}
	}
	else{
		echo "Invalid file";
	}
	//start of mysql code
	if(isset($_POST['submit'])){
		$sql="INSERT INTO form (id,
		name,
		email,
		website,
		comment,
		gender,
		file_path)
		VALUES('',
		'$_POST[name]',
		'$_POST[email]',
		'$_POST[website]',
		'$_POST[comment]',
		'$_POST[gender]',
		'$file_path')";
		if(mysqli_query($conn,$sql)){
			echo "New record created successfully";
		}else{echo "Error:".$sql."<br>".mysql_error($conn);
		}
	}
?>


<?php mysqli_close($conn);?>
