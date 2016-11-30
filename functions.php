<?php
	require("/home/kriskand/config.php");

	/* ALUSTAN SESSIOONI */
	session_start();
		
	/* ÜHENDUS */
	$database = "if16_kriskand_bemmid";
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	
	require("class/user.class.php");
	$User = new User($mysqli);
	

?>