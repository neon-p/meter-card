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
	<script type="text/javascript">
		function delete_req()
		{
			var id_d= document.getElementById("delete_req").value;
				$.ajax({
				type: 'post',
				url: 'delete.php',
				data: {
					id_d:id_d},
					success: function () {
						
					}
				});
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
	<div class="navbar navbar-expand-lg navbar-light"></div>
	<div id="show" style="padding-right: 100px; padding-left: 100px;">
	  <table  class='table'>
	  	<thead class="thead-dark">
    		<tr>
    		<th style="padding-left: 80px;" scope="col">Unit</th>
		    <th style="padding-left: 80px;" scope="col">Price</th>
			<th style="padding-left: 80px;" scope="col">Expire Date</th>
			<th style="padding-left: 80px;" scope="col">Meter No</th>
		    <th style="padding-left: 80px;" scope="col">Account</th>
			<th style="padding-left: 80px;" scope="col">TRX ID</th>
			<th style="padding-left: 80px;" scope="col"></th>
			<th style="padding-left: 80px" scope="col"></th>
		    </tr>
		</thead>
				<?php
				include ('dbconnect.php');

				$sql = "SELECT * FROM `payment` WHERE status='Pending'";
				$result = mysqli_query($con, $sql);

				while ($row = mysqli_fetch_array($result)) {
					$payment_id= $row['payment_id'];
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
									echo "<tbody>";
									echo "<tr>";
									echo "<td style='padding-left: 80px;'>".$unit_value."</td>";
							 		echo "<td style='padding-left: 80px;'>".$price."</td>";
									echo "<td style='padding-left: 80px;'>".$ExpDate."</td>";
									echo "<td style='padding-left: 100px;'>".$meter_no."</td>";
							 		echo "<td style='padding-left: 100px;'>".$a_c."</td>";
									echo "<td style='padding-left: 85px;'>".$trx_id."</td>";
									echo "<td style=''><a class='btn btn-outline-primary' href='send_card.php?payment_id=$payment_id'>Approved</a></td>";?>
									<td style=''><button class='btn btn-outline-primary' id='delete_req' value='<?php echo $payment_id;?>' onclick='delete_req();'>Decline</button></td>
				<?php
									echo "</tbody>";
									echo "</tr>";
								}

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