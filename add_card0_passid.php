<?php 
	session_start();
?>
<?php
	include ('dbconnect.php');

	$unit_id = $_SESSION['unit_id'];
	$unit_id = "SELECT * FROM `card_unit` WHERE unit_id='$unit_id'";
	$result = mysqli_query($con, $unit_id);            

	while($row = mysqli_fetch_array($result))
	{

		$unit_id = $row['card_unit_id'];
		$_SESSION['unit_id']=$unit_id;
		header("Location: add_card.php");
	}         
    mysqli_close($con);
?>