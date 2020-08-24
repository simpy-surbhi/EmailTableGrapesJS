<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="maildetails";
	$conn = mysqli_connect($servername, $username, $password,$db);

	$htmlValue=$_POST['htmlData'];
	echo "here ".$htmlValue;
	$cssValue=$_POST['CSSData'];
	$styleValue=$_POST['StyleData'];

	$sql = "INSERT INTO `mailformat`( `MailHTML`, `MailCSS`, `MailStyle`) 
	VALUES ('$htmlValue','$cssValue','$styleValue')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	mysqli_close($conn);
?>