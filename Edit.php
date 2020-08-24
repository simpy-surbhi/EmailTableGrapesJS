<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="maildetails";
	$con = mysqli_connect($servername, $username, $password,$db);
    $output_array=Array();	
	$id = isset($_GET['htmlId']) ? intval($_GET['htmlId']): 0;
    // $sql = "Select * from mailformat where id =" . $id;
    $sql="SELECT MailHTML,MailCSS,MailStyle FROM mailformat where ID=$id";
	$result = mysqli_query($con,$sql);
	 while($row=mysqli_fetch_array($result))
    {
        $output_array=Array("HTMLval"=>$row['MailHTML'],
                            "CSS"=>$row['MailCSS'],
							"STYLE"=>$row['MailStyle']);
		$output_array1= json_encode($output_array);	
							
						//	echo json_encode($output_array, JSON_FORCE_OBJECT);	
	}
	$output_array2= json_decode($output_array1);	 
	$val1= $output_array2->HTMLval;
	$val2= $output_array2->CSS;
	$val3= $output_array2->STYLE;
	
	$n = mysqli_fetch_array($result);
	
	$arrVqlue = array( $val1, $val2, $val3);
	$ListNo = implode('||', $output_array); 
	print_r ($ListNo);
	if ($con->query($sql) !== TRUE) {
		//echo "New record created successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . $con->error;
	  }
	mysqli_close($con);
?>