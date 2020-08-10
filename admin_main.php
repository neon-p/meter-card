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
            <li class="nav-item">
              <?php
                include("dbconnect.php");
                $sql=mysqli_query($con, "SELECT COUNT(payment_id) AS id FROM payment WHERE status='Pending'");
                $req=mysqli_fetch_assoc($sql);
              ?>
              <a class="nav-link" style="font-weight:600; color:#111011;" href="request.php">Request(<?php echo $req['id'];?>)</a>
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

<div>
  <a class="btn btn-outline-primary" href="add_card0.php" style="margin-left:47.7%;margin-right:auto;margin-top:1%;margin-bottom:7%;">Manage Card</a>
  </br>
</div>


  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
</body>
</html>

