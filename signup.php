<?php
	include("dbconnect.php");
?>
<?php
	if(isset($_POST["Register"])){
		
		$username = $_POST["Name"];
		$Email = $_POST["Email"];
		$Pass = $_POST["Pass"];
		$Pass2 = $_POST["PassR"];
		$Mobile = $_POST["Mobile"];
		
		if(!empty($Email) && !empty($Pass) && !empty($Mobile)){
				
			$query= "INSERT INTO `user`(`name`,`email`, `password`, `mobile`) VALUES ('$username','$Email', '$Pass', '$Mobile')";
			
			if($con->query($query) == TRUE){
				echo "<script>location.href='home.php';</script>";
				echo "<script>alert('Welcome!')</script>";
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
  <title>SignUp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  
  <script type="text/javascript">
  	function checkingChar(){
  		var str = document.getElementById('Pass').value;
  		var length = str.length;
  		if(4 <= length){
  			document.getElementById('messageP').innerHTML = '';
	        document.getElementById('Register').disabled =false;
	        document.getElementById('PassR').disabled = false;
	    }else {
	    	document.getElementById('messageP').style.color = 'red';
    		document.getElementById('messageP').innerHTML = '*Password must be 4 character';
	        document.getElementById('Register').disabled = true;
	        document.getElementById('PassR').disabled = true;
	    }
	}
  </script>
  <script type="text/javascript">
  	function checkingPass() {
	    if(document.getElementById('Pass').value !=
	            document.getElementById('PassR').value){
	    	document.getElementById('message').style.color = 'red';
    		document.getElementById('message').innerHTML = '*Password doesnt match';
	        document.getElementById('Register').disabled = true;
	    }else if(document.getElementById('Pass').value ==
	            document.getElementById('PassR').value){
	        document.getElementById('Register').disabled = false;
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
		<form class="form" method="post" action="signup.php">
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="username">Name</label>
			      <input type="text" class="form-control"  id="Name" name="Name" placeholder="Name" required>
			    </div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="inputEmail4">Email</label>
			      <input type="email" class="form-control"  id="Email" name="Email" placeholder="Email" required>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="Pass">Password</label>
			      <input type="Password" class="form-control" id="Pass" name="Pass" placeholder="Password" required onchange="checkingChar()">
			      <span id='messageP' ></span>
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="PassR">Repeat Password</label>
			      <input type="Password" class="form-control" id="PassR" placeholder="Repeat Password" name="PassR" onchange=" checkingPass();">
			      <span id='message' ></span>
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="mobile">Mobile No</label>
			      <input type="text" class="form-control" name="Mobile" placeholder="Mobile No"  id="Mobile" required>
			    </div>
			 </div>
			  <button type="submit" class="btn btn-primary" style="margin-left: 17%;" id="Register" name="Register" disabled>Register</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>