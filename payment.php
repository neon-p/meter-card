<?php
	session_start();
?>
<?php
	include("dbconnect.php");
?>
<?php
	if(isset($_POST["Pay"])){
		
		$TRX = $_POST["TRX"];
		$Card_id= $_SESSION['card_id'];
		$Meter_No= $_POST['meter-no'];
		$Account_No= $_POST['a/c'];

		if(!empty($TRX) && !empty($Meter_No) && !empty($Account_No)){

        	$sql = "SELECT account, meter_no FROM `payment` WHERE account ='$Account_No' OR meter_no='$Meter_No' ";
        	$sql1=$con->query($sql);
        	$row=$sql1->fetch_assoc();

        	if($row['account']==$Account_No || $row['meter_no']==$Meter_No){
        		echo"<script>alert('Your Account Or Meter No was wrong');</script>";
        	}else{
				$query= "INSERT INTO `payment` (`trx_id`, `user_id`, `card_id`, `status`, `account`, `meter_no`) VALUES ('$TRX', '1', '$Card_id', 'Pending', '$Meter_No', '$Account_No')";
				if($con->query($query) == TRUE){
						header("Location: home.php");
				}
				else{
					echo "Die";
				}
        	}
			
		} else {
			echo "All field must be filled up";
		}
		$con->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
	<header>
    <!-- heading website name in navbar-->
	<nav class="navbar navbar-expand-lg" style="background-color:#29df9f;">
  		<a class="navbar-brand" style="font-weight: 600; color:#111011;" href="home.php">Online Meter Card</a>
  		
      <!-- 2nd part of navigation -->
  		<div class="ml-auto order-0">
  		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
  			<span class="navbar-toggler-icon"></span>
  		  </button>
  		  
  		  <div class="collapse navbar-collapse" id="navbarContent">
  			
    			<ul class="navbar-nav mr-auto">
    			  <li class="nav-item">
    				  <a class="nav-link" style="font-weight:600; color:#111011;" href="home.php">Home</a>
    			  </li>
    			  <li class="nav-item">
    				  <a class="nav-link" style="font-weight:600; color:#111011;" href="#">Contact</a>
    			  </li>
    			</ul>
          
  		  </div> 
  		</div> 
		</nav>
	</header>
	<div class="navbar navbar-expand-lg navbar-light">
		<form class="form" method="post" action="payment.php">
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="Account No">Account No</label>
			      <input type="text" class="form-control"  id="a/c" name="a/c" placeholder="Account No" required">
			    <span id='messageP'></span>
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="Meter No">Meter No</label>
			      <input type="text" class="form-control"  id="meter-no" name="meter-no" placeholder="Meter No" required">
			    <span id='messageP' ></span> 
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="TRX">Upload TRX ID</label>
			      <input type="text" class="form-control"  id="TRX" name="TRX" placeholder="TRX ID" required">
			    <span id='messageP' ></span>
				</div>   
			</div>
			  <button type="submit" class="btn btn-primary" style="margin-left: 17%;" id="Pay" name="Pay">Pay</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>