<?php
	session_start();
?>
<?php
	include("dbconnect.php");
?>
<?php
	if(isset($_POST["Next"])){
		
		$Card_Number = $_POST["Card_Number"];
		$ExpDate = $_POST["ExpDate"];
		$card_unit_id= $_SESSION['unit_id'];
		
		if(!empty($ExpDate) && !empty($Card_Number)){
				
			$query= "INSERT INTO `card_details`(`card_number`,`exp_date`, `card_unit_id`) VALUES ('$Card_Number','$ExpDate', '$card_unit_id')";
			
			if($con->query($query) == TRUE){
				$_SESSION['Card_Number']=$Card_Number;
				header("Location: add_card_passid.php");
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
  	function checkingChar(){
  		var str = document.getElementById('Card_Number').value;
  		var length = str.length;
  		if(12 <= length){
  			document.getElementById('messageP').innerHTML = '';
	        document.getElementById('Next').disabled =false;
	        document.getElementById('Card_Number_Repeat').disabled = false;
	    }else {
	    	document.getElementById('messageP').style.color = 'red';
    		document.getElementById('messageP').innerHTML = '*Card Number must be 12 character';
	        document.getElementById('Next').disabled = true;
	        document.getElementById('Card_Number_Repeat').disabled = true;
	    }
	}
  </script>
  <script type="text/javascript">
  	function matching() {
	    if(document.getElementById('Card_Number').value !=
	            document.getElementById('Card_Number_Repeat').value){
	    	document.getElementById('message').style.color = 'red';
    		document.getElementById('message').innerHTML = '*Card Number doesnt match';
	        document.getElementById('Next').disabled = true;
	    }else if(document.getElementById('Card_Number').value ==
	            document.getElementById('Card_Number_Repeat').value){
	        document.getElementById('Next').disabled = false;
	        document.getElementById('message').style.color = '';
	        document.getElementById('message').innerHTML = '';
	    }
    }
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
		<form class="form" method="post" action="add_card.php">
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="Card_Number">Card Hidden Number</label>
			      <input type="text" class="form-control"  id="Card_Number" name="Card_Number" placeholder="Card Hidden Number" required onchange="checkingChar();">
			    <span id='messageP' ></span>
			</div>    
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="Card_Number_Repeat">Repeat Card Hidden Number</label>
			      <input type="text" class="form-control"  id="Card_Number_Repeat" name="Card_Number_Repeat" placeholder="Repeat Card Hidden Number" required onchange="matching();">
			      <span id='message' ></span>
			    </div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="inputExpDate4">Expire Date</label>
			      <input type="Date" class="form-control"  id="ExpDate" name="ExpDate" placeholder="Expire Date" required>
			    </div>
			</div>
			  <button type="submit" class="btn btn-primary" style="margin-left: 17%;" id="Next" name="Next" disabled>Next</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>