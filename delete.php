<?php
include('dbconnect.php');

	if(isset($_POST["id_d"])){

		$id_d = $_POST["id_d"];

				
			$sql= "DELETE FROM `payment` WHERE payment_id='$id_d'";
			
			if($con->query($sql) == TRUE){
				echo "<script>alert('Deleted');</script>";
			}
			else{
				echo"<div>Die</div>";
			}
		$con->close();
	}
?>
