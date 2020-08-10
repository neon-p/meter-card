<?php 
	session_start();
?>
<?php
	include ('dbconnect.php');

	$c_n = $_SESSION['Card_Number'];
	$c_d_id = "SELECT * FROM `card_details` WHERE card_number='$c_n'";
	$result = mysqli_query($con, $c_d_id);            

	while($row = mysqli_fetch_array($result))
	{

		$c_d_id = $row['card_details_id'];
		$_SESSION['card_details_id']=$c_d_id;
		header("Location:add_card1.php");
	}         
    mysqli_close($con);
?>