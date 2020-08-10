<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forget Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
	<header>
    <!-- heading website name in navbar-->
		<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom box-shadow border-bottom box-shadow">
		<a class="navbar-brand" style="font-weight: 600;" href="#">Rent a Car</a>
		
    <!-- 2nd part of navigation -->
		<div class="ml-auto order-0">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  
		  <div class="collapse navbar-collapse" id="navbarContent">
			
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link" style="font-weight: 600;" href="home.php">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" style="font-weight: 600;" href="#">Contact</a>
			  </li>
			</ul>
		  </div> 
		</div> 
		</nav>
	</header>
	<?php
		if(isset($_POST['sendmail'])){
			if(mail($_POST['email'], 'Recover Password', $_POST['message'])){
				echo "alert('Mail send')";
			}else{
				echo "Failed";
			}
		}
	?>
	<div class="navbar navbar-expand-lg navbar-light">
		<form class="form" method="post" action="forgetpass.php">
			<p>We are sending a new password in your Email.</p>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label>Email</label>
			      <input type="email" class="form-control" name="email" placeholder="Email">
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label>Recover Password</label>
			      <input type="Password" class="form-control" name="message" placeholder="Password">
			    </div>
			 </div>
			 <button type="submit" class="btn btn-outline-primary" name="sendmail" style="margin-left: 17%;">Send</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>