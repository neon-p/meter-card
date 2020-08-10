<?php
	session_start();
?>

<?php
include('dbconnect.php');

		$payment_id = $_SESSION["payment_id"];
		unset($_SESSION['payment_id']);

		$sql= "UPDATE `payment` SET `status`='Done' WHERE payment_id='$payment_id' ";

		if($con->query($sql) == TRUE){
				header("Location: request.php");
			}
			else{
				echo "<script>alert('Die');</script>";
			}
		$con->close();
?>
