<?php
	session_start();
?>
<?php
	include("dbconnect.php");
?>
<?php
	if(isset($_POST["Finish"])){
		
		$Card_Price = $_POST["Card_Price"];
		$Card_Details_id= $_SESSION['card_details_id'];
		
		if(!empty($Card_Price)){
				
			$query= "INSERT INTO `card_price` (`price`, `card_number_id`) VALUES ('$Card_Price', '$Card_Details_id')";
			
			if($con->query($query) == TRUE){
				header("Location: admin_main.php");
			}
			else{
				echo "Die";
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
  <title>Add Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <script type="text/javascript">
  	
  </script>
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
		<form class="form" method="post" action="add_card1.php">
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="Card_Price">Card Price</label>
			      <input type="text" class="form-control"  id="Card_Price" name="Card_Price" placeholder="Card Price" required onchange="retrive();">
			    <span id='messageP' ></span>
			</div>    
			</div>
			  <button type="submit" class="btn btn-primary" style="margin-left: 17%;" id="Finish" name="Finish">Finish</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>