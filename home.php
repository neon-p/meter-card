<?php
  include("config.php");

  if(isset($_SESSION['access_token'])){
    header("Location: main1.php");
    exit();
  }
  $loginURL= $gClient->createAuthUrl();
?>

<?php
  include("dbconnect.php");

  if(isset($_POST["login"])){
      $email = $_POST["email"];
      $password = $_POST["password"];
      
      if(!empty($email) && !empty($password)){
        $sql = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
        $sql1=$con->query($sql);
        $row=$sql1->fetch_assoc();
        
        if($row['password']== $password){
          //$_SESSION["email"]=$_POST["email"];
         //$_SESSION["user_id"]=$row["user_id"];


          header("Location: card_content.php");
        }else{
          echo "wrongpass";
        }
      }else{
        echo "All field must be filled up";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
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
            <li>
              <a class="btn btn-outline-primary" style="font-weight:600;color:#111011;" href="signup.php"> SignUp</a>
            </li>
    			</ul>
          
  		  </div> 
  		</div> 
		</nav>
	</header>

  <div class="container-fluid">
   <div class="content1">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1" style="border-bottom: 1px solid #e5e5e5; border-top: 1px solid #e5e5e5;
      box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
        <div id="demo" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>

          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="card-img img-fluid" src="pic/m_c1.jpg">
            </div>
            <div class="carousel-item">
              <img src="pic/m_c2.jpg" class="card-img img-fluid">
            </div>
            <div class="carousel-item">
              <img class="card-img img-fluid" src="pic/m_c8.jpg">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
      <div class="col-6 py-0 px-1 d-none d-lg-block">
       <div class="content2">
        <div class="">
          <div class="">
            <h1>What is Lorem Ipsum?</h1></br>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
         </div> 
        </div>
      </div>
     </div>
    </div>
  </div>
  <!-- carousel end-->

<!-- Trigger the modal with a button -->
<div>
  <button type="button" class="btn btn-outline-primary" id="myBtn" data-toggle="modal" data-target="#myModal" style="margin-left:49.7%;margin-right:auto;display:block;margin-top:1%;margin-bottom:4%;">Sign In</button>
  </br>
</div>
<div>
  <input type="button" onclick="window.location='<?php echo $loginURL ?>';" class="btn btn-outline-primary" style="margin-left:46.3%;margin-right:auto;display:block;margin-top:-5%;margin-bottom:auto;" value="Sign In with Google" >
  </br>
</div>


<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times </button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="home.php">
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span>Email</label>
              <input type="text" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
              <button type="submit" class="btn btn-success btn-block" name="login"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left:5%;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:auto;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    		  <div class="text">
    			   <p>Not a member? <a href="signup.php">Sign Up</a></p>
    			   <p>Forgot <a href="forgetpass.php">Password?</a></p>
    		  </div>
        </div>
      </div>
    </div>
  </div> 
</div>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
</body>
</html>
