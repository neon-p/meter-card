<?php
   include ('dbconnect.php');

    if(isset($_POST['date'])) {

          //$brand = $_POST['brandSelect'];
          $date_id = $_POST["date"];


		            $sql = "SELECT * FROM `card_price` WHERE card_number_id='$date_id' ";
		            $result2 = mysqli_query($con, $sql);
	            
		            while($row = mysqli_fetch_array($result2))
		            {
		              
		              $price =$row['price'];
		              $card_number_id=$row['card_number_id'];
		              
		              echo "<div id='' class='col-md-4' style=''>";
		              
		              echo "Meter Card";
		              echo "<br>";
		              echo'&nbsp';
		              echo "Available: ";
		              echo '' . $price. '';
		              echo "</br>"; 
		              echo'&nbsp';
		              echo "<br>";
		              echo'&nbsp';
		              echo "<br>";
		              echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
					  echo "<a class='btn btn-outline-primary' href='paymentint.php?card_id=$card_number_id'>Buy</a>";
		
		              echo "<br>";
		              echo "<br>";
		              //echo "</div>";
		              echo "</div>";
		            }
        mysqli_close($con);
    }
?>