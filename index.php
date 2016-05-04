<?php include("db_connect.php");?>
<?php include("header.php"); ?>
	
	<form method="post" action="upload.php" enctype="multipart/form-data"> 
	   Name: <input type="text" name="name" value="<?php echo $name; ?>">
	   <span class="error">* <?php echo $nameErr;?></span>
	   <br><br>
	   E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
	   <span class="error">* <?php echo $emailErr;?></span>
	   <br><br>
	   Website: <input type="text" name="website" value="<?php echo $website; ?>">
	   <span class="error"><?php echo $websiteErr;?></span>
	   <br><br>
	   Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
	   <br><br>
	   Gender:
	   <input type="radio" name="gender"  <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
	   <input type="radio" name="gender"  <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
	   <span class="error">* <?php echo $genderErr;?></span>
	   <br><br>
	   File: <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
	   <input type="submit" name="submit" value="Submit"> 
	</form>
<?php include("footer.php"); ?>
<?php mysqli_close($conn);?>