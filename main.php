<?php
  include("config.php");

  if(isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
  } else if(isset($_GET['access_token'])){
    $gClient->setAccessToken($_SESSION["access_token"]);
  } else{
    header("Location: home.php");
    exit();
  }

  $oAuth = new Google_Service_Oauth2($gClient);
  $userData = $oAuth->userinfo_v2_me->get();

  $_SESSION['email']=$userData['email'];
  $_SESSION['name']=$userData['name'];

  header("Location: main1.php");
  exit();
?>

