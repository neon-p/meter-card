<?php
	session_start();
?>
<?php
	include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/modal.js"></script>
  <script type="text/javascript"></script>
  	<!-- <script type="text/javascript">
		function selectDate()
		{
			var date= document.getElementById("ExpDate").value;
				$.ajax({
				type: 'post',
				url: 'selectDate.php',
				data: {
					date:date},
					success: function (html) {
						$('#show').html(html);
					}
				});
		}
	</script> -->
	<script type="text/javascript">
		function selectUnit()
		{
			var unit= document.getElementById("unit").value;
				$.ajax({
				type: 'post',
				url: 'selectUnit.php',
				data: {
					unit:unit},
					success: function (html) {
						$('#show').html(html);
					}
				});
		}
	</script>
	<!-- <script type="text/javascript">
		function selectPrice()
		{
			var price= document.getElementById("Card_Price").value;
				$.ajax({
				type: 'post',
				url: 'selectPrice.php',
				data: {
					price:price},
					success: function (html) {
						$('#show').html(html);
					}
				});
		}
	</script> -->
	<script type="text/javascript">
		function calculateTaka()
		{
			var unit= document.getElementById("calculate").value;
			var length= unit.length;
			if(length>=2){
				var cal= unit*3.50;
				document.getElementById('messageCal').style.color = 'Green';
				document.getElementById("messageCal").innerHTML=unit+" Unit = " +cal+" Taka";
			}else{
				document.getElementById('messageCal').style.color = 'red';
				document.getElementById("messageCal").innerHTML="Sorry!There is no Card available in this Ammount.";
			}
		}
	</script>
	<script type="text/javascript">
		function calculateUnit()
		{
			var taka= document.getElementById("calculate").value;
			var length= taka.length;
			if(length>=3){
				var cal= taka/3.50;
				document.getElementById('messageCal').style.color = 'Green';
				document.getElementById("messageCal").innerHTML=taka+" Taka = " +cal+" Unit";
			}else{
				document.getElementById('messageCal').style.color = 'red';
				document.getElementById("messageCal").innerHTML="Sorry!There is no Card available in this Unit.";
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
		<form class="form" method="post" action="card_content.php">
			<div class="form-row">
				<div class="form-group col-md-6">
					<?php 
						$query = $con->query("SELECT * FROM unit");

						$rowCount = $query->num_rows;
					?>
					<select class ="form-control" name="unit" id="unit" onchange="selectUnit();">
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
		</form>
	</div>
<div class="container-fluid">
  	<h5>Per Unit 3.50 Taka</h5>
  	<h6>Calculate your Cost</h6>
  	<from>
  		<div class="form-row">
  			<div class="form-group col-sm-3">
  				<span id='messageCal'></span>
  				<input type="text" id="calculate" class="form-control">
  			</br>
  				<button class="btn btn-primary" onclick="calculateUnit();">Taka</button>
  				<button class="btn btn-primary" onclick="calculateTaka();">Unit</button>
  				<span id='messageCal'></span>
  			</div>
  		</div>
  		
  	</from>
</div>
	<div class="navbar navbar-expand-lg navbar-light"></div>
	<div id="show" style="padding-right: 200px; padding-left: 200px;">
	  <table  class='table'>
	  	<thead class="thead-dark">
    		<tr>
    		<th style="padding-left: 100px;" scope="col">Unit</th>
		    <th style="padding-left: 100px;" scope="col">Price</th>
			<th style="padding-left: 100px;" scope="col">Expire Date</th>
			<th style="padding-left: 100px;" scope="col"></th>
		    </tr>
		</thead>
				<?php
				include ('dbconnect.php');

				$sql = "SELECT * FROM `unit`";
				$result = mysqli_query($con, $sql);

				while ($row = mysqli_fetch_array($result)) {
					$unit= $row['unit_value'];
					$unit_id= $row['unit_id'];
					$sql1= "SELECT * FROM card_unit WHERE unit_id='$unit_id'";
					$result1 = mysqli_query($con, $sql1);

					while ($row1= mysqli_fetch_array($result1))
					{
						$card_unit_id=$row1['card_unit_id'];
						$sql2 = "SELECT * FROM `card_details` WHERE card_unit_id='$card_unit_id' ";
						$result2 = mysqli_query($con, $sql2);
						while($row2 = mysqli_fetch_array($result2))
						{
							$ExpDate =$row2['exp_date'];
							$card_details_id=$row2['card_details_id'];
							$sql3 = "SELECT * FROM `card_price` WHERE card_number_id='$card_details_id' ";
							$result3 = mysqli_query($con, $sql3);
							while ($row3 = mysqli_fetch_array($result3))
							{
								$price =$row3['price'];
								$card_number_id=$row3['card_number_id'];
								echo "<tbody>";
								echo "<tr>";
								echo "<td style='padding-left: 100px;'>".$unit."</td>";
							 	echo "<td style='padding-left: 100px;'>".$price."</td>";
								echo "<td style='padding-left: 100px;'>".$ExpDate."</td>";
								echo "<td style='padding-left: 100px;'><a class='btn btn-outline-primary' href='paymentint.php?card_id=$card_number_id'>Buy</a></td>";
								echo "</tbody>";
								echo "</tr>";

							}
						}
					}
					
				}
					mysqli_close($con);
				?>		
	  </table>
    </div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>