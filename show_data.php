<?php include("db_connect.php");?>
<?php 
echo "<h2>Your data from the database;</h2>";
$sql ="SELECT id,name,email,website,comment,gender,file_path FROM form";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0){
	//output data of each row
	while($row=mysqli_fetch_assoc($result))
	{
		echo "id:".$row["id"].
		"&nbsp Name:".$row["name"].
	    "&nbsp E-mail:".$row["email"].
	    "&nbsp Website:".$row["website"].
		"&nbsp Comment:".$row["comment"].
		"&nbsp Gender:".$row["gender"].
		'&nbsp <img height="200px" width="200px" src="'.$row["file_path"].'">'. 
		'&nbsp <a href="update.php?'. $row["id"].'"><input type="submit" name="update" value="update"></a>'. "<br>";
		
	}
	
}else {
		echo "0 results";
	}
	
?>
<?php mysqli_close($conn);?>