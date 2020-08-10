<?php
  session_start();

  if(!isset($_SESSION['access_token'])){
    header("Location: home.php");
    exit();
  }
?>
<?php
  include("dbconnect.php");
?>
<?php
    
    $username = $_SESSION["name"];
    $Email = $_SESSION["email"];
        
      $query= "INSERT INTO `user`(`name`,`email`, `password`, `mobile`) VALUES ('$username','$Email', 'blank', 'blank')";
      
      if($con->query($query) == TRUE){
        $sql = "SELECT * FROM `user` WHERE email='$Email'";
        $sql1=$con->query($sql);
        $row=$sql1->fetch_assoc();
        
        if($row['email']== $Email){
          //$_SESSION["email"]=$_POST["email"];
         $_SESSION['user_id'] = $row["id"];


          header("Location: card_content.php");
        }else{
          echo "wrongpass";
        }
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