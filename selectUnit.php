<?php
   include ('dbconnect.php');

    if(isset($_POST['unit'])) {

          $unit_id = $_POST["unit"];
          $sql0= "SELECT * FROM card_unit WHERE unit_id='$unit_id'";
          $result = mysqli_query($con, $sql0);
          while ($row= mysqli_fetch_array($result))
          {
          			$card_unit_id=$row['card_unit_id'];
          			$sql = "SELECT * FROM `card_details` WHERE card_unit_id='$card_unit_id' ";
		            $result2 = mysqli_query($con, $sql);
		            while($row = mysqli_fetch_array($result2))
		            {
		            	$ExpDate =$row['exp_date'];
		            	$card_details_id=$row['card_details_id'];
		            	$sql1 = "SELECT * FROM `card_price` WHERE card_number_id='$card_details_id' ";
		            	$result3 = mysqli_query($con, $sql1);
		            	while ($row1 = mysqli_fetch_array($result3))
		            	{
		            		$price =$row1['price'];
		              		$card_number_id=$row1['card_number_id'];

		            		echo "<div> ";
	  						echo"<table  class='table'>";	
							echo"<thead class='thead-dark'>";
						    echo"<tr>";
							echo"<th style='padding-right: 100px; padding-left: 100px;' scope='col'>Price</th>";
							echo"<th style='padding-right: 100px; padding-left: 100px;' scope='col'>Expire Date</th>";
							echo"<th style='padding-right: 100px; padding-left: 100px;' scope='col'></th>";
							echo "</tr>";
							echo "</thead>";
							echo "<tbody>";
							echo "<tr>";
						 	echo "<td style='padding-right: 100px; padding-left: 100px;'>".$price."</td>";
							echo "<td style='padding-right: 100px; padding-left: 100px;'>".$ExpDate."</td>";
							echo "<td style='padding-right: 100px; padding-left: 100px;'><a class='btn btn-outline-primary' href='paymentint.php?card_id=$card_number_id'>Buy</a></td>";
							echo "</tr>";
							echo "</tbody>";
							echo "</table>";
							echo "</div>";
		            	}
		            }
          }
        mysqli_close($con);
    }
?>