<?php
	session_start();
	include("GoogleApi/vendor/autoload.php");
	$gClient = new Google_Client();
	$gClient->setClientId("570463345240-an82i2c7sg08tlfdrufc8gsopb424v5j.apps.googleusercontent.com");
	$gClient->setClientSecret("sESyurGOUg2N_8RvKlBKghI4");
	$gClient->setApplicationName("Online Meter Card");
	$gClient->setRedirectUri("http://localhost/Meter%20Card/main.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>