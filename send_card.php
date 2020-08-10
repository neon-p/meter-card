<?php
	session_start();
?>
<?php
	include('dbconnect.php');
	if(isset($_GET['payment_id'])){
		$payment_id= $_GET['payment_id'];
		$_SESSION['payment_id']=$payment_id;
		header("location: send_card1.php"); 
	}else{
		echo "<script>alert('variable not pass')</script>";
	}
?>
