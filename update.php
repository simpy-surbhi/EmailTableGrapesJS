<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$db="maildetails";
	$conn = mysqli_connect($servername, $username, $password,$db);
		
	$htmlId=$_POST['htmlID'];
    $htmlValue=$_POST['htmlData'];  
	$cssValue=$_POST['CSSData'];
	$styleValue=$_POST['StyleData'];
echo $htmlId;

    $sql = "UPDATE mailformat SET MailHTML='{$htmlValue}',MailCSS='{$cssValue}',MailStyle='{$styleValue}' WHERE ID='$htmlId'";
	if ($conn->query($sql) === TRUE) {
		echo "Record Updqted successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	mysqli_close($conn);

?>