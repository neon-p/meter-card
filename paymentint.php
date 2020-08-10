<?php
	session_start();
	include('dbconnect.php');
?>

<?php
	if(isset($_GET['card_id'])){
	$card_id= $_GET['card_id'];
	$_SESSION['card_id']=$card_id;
	header("location: payment.php"); 
}else{
	echo "<script>alert('variable not pass')</script>";
}
?>