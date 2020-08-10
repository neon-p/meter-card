<?php
	session_start();
?>
<?php
	include("dbconnect.php");
	$payment_id=$_SESSION["payment_id"];
	$pay = "SELECT * FROM `payment` WHERE payment_id='$payment_id'";
	$pay_r = mysqli_query($con, $pay);

	while ($r= mysqli_fetch_array($pay_r)) {
		$user_id= $r['user_id'];
		$pay1= "SELECT name,email FROM user WHERE id='$user_id'";
		$pay1_r= mysqli_query($con, $pay1);

		while ( $r1 = mysqli_fetch_array($pay1_r)) {
			$name = $r1['name'];
			$email = $r1['email'];
		}	
	}
?>
<?php
	if(isset($_POST['send'])){
		if(mail($_POST['email'], 'Meter Card', $_POST['message'])){
			echo "<script>alert('Card Send');</script>";
			header("Location:approved.php");
		}else{
			echo "Failed";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Card Delivery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
	<header>
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
	</header>
	<div class="navbar navbar-expand-lg navbar-light">
		<form class="form" method="post" action="send_card1.php">
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label>Email</label>
			      <input type="email" class="form-control" name="email" value="<?php echo $email;?>" placeholder="Email">
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label>User and Card Details</label>
			      <textarea rows="8" cols="50" name="message">
			      <?php
			      		include("dbconnect.php");
			      		$payment_id=$_SESSION["payment_id"];
			      		$sql = "SELECT * FROM `payment` WHERE payment_id=$payment_id";
						$result = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_array($result)) {
							$trx_id= $row['trx_id'];
							$card_id= $row['card_id'];
							$a_c= $row['account'];
							$meter_no=$row['meter_no'];
								$sql1= "SELECT * FROM card_price WHERE card_number_id='$card_id'";
								$result1 = mysqli_query($con, $sql1);

								while ($row1= mysqli_fetch_array($result1))
								{
									$card_number_id=$row1['card_number_id'];
									$price=$row1['price'];
									$sql2 = "SELECT * FROM `card_details` WHERE card_details_id='$card_number_id' ";
									$result2 = mysqli_query($con, $sql2);

									while($row2 = mysqli_fetch_array($result2))
									{
										$ExpDate =$row2['exp_date'];
										$card_number=$row2['card_number'];
										$card_unit_id=$row2['card_unit_id'];
										$sql3 = "SELECT * FROM `card_unit` WHERE card_unit_id='$card_unit_id' ";
										$result3 = mysqli_query($con, $sql3);

										while ($row3 = mysqli_fetch_array($result3))
										{
											$unit_id=$row3['unit_id'];
											$sql4 = "SELECT * FROM `unit` WHERE unit_id='$unit_id'";
											$result4= mysqli_query($con, $sql4);

											while ($row4 = mysqli_fetch_array($result4)) {
												$unit_value= $row4['unit_value'];
												echo"Hi, ".$name."\n Your Card Details-\n Unit: ".$unit_value."\n Price: ".$price."\n Expire Date: ".$ExpDate."\n Meter No: ".$meter_no."\n Account No: ".$a_c."\n Hidden Pin: ".$card_number."";
												
											}

										}
									}
								}
							}
						mysqli_close($con); 
			      	?>
			      </textarea>
			    </div>
			 </div>
			 <button type="submit" class="btn btn-outline-primary" name="send" style="margin-left: 30%;">Send</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>