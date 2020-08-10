<?php
   include ('dbconnect.php');

    if(isset($_POST['price'])) {

          $card_number_id = $_POST["price"];


		            $sql = "SELECT * FROM `card_details` WHERE card_details_id='$card_number_id' ";
		            $result2 = mysqli_query($con, $sql);
	            
		            while($row = mysqli_fetch_array($result2))
		            {
		              
		              $ExpDate =$row['exp_date'];
		              $card_details_id=$row['card_details_id'];
		              
		              echo "<div id='' class='col-md-4' style=''>";
		              
		              echo "Meter Card";
		              echo "<br>";
		              echo'&nbsp';
		              echo "Expire Date: ";
		              echo '' . $ExpDate. '';
		              echo "</br>"; 
		              echo'&nbsp';
		              echo "<br>";
		              echo'&nbsp';
		              echo "<br>";
		              echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
		              echo "<a class='btn btn-outline-primary' href='paymentint.php?card_id=$card_details_id'>Buy</a>";
		
		              echo "<br>";
		              echo "<br>";
		              //echo "</div>";
		              echo "</div>";
		            }
        mysqli_close($con);
    }
?>