<?php
	session_start();
?>
<?php
	include("dbconnect.php");

	if(isset($_POST["Next"])){
		
		$unit_id = $_POST["unit"];
		
		if(!empty($unit_id)){
				
			$query= "INSERT INTO `card_unit`(`unit_id`) VALUES ('$unit_id')";
			
			if($con->query($query) == TRUE){
				$_SESSION['unit_id']=$unit_id;
				header("Location: add_card0_passid.php");
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
		<form class="form" method="post" action="add_card0.php">
			<div class="form-row">
				<div class="form-group col-md-6">
					<?php 
						$query = $con->query("SELECT * FROM unit ");

						$rowCount = $query->num_rows;
					?>
					<select class ="form-control" name="unit" id="unit">
						<option value="">Select Unit</option>
						<?php
							if($rowCount > 0){
								while($row = $query->fetch_assoc()){ 
									echo '<option value="'.$row['unit_id'].'">'.$row['unit_value'].'</option>';
								}
							}else{
								echo '<option value="">Unit not available</option>';
							}
						?>
					</select>
				</div>    
			</div>
			  <button type="submit" class="btn btn-primary" style="margin-left: 17%;" id="Next" name="Next">Next</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>