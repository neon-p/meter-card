<?php
	include("config.php");
	unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
	header("Location: home.php");
	exit();
?>