<?php

	require("/home/johareil/config.php");

	/* ALUSTAN SESSIOONI */
	session_start();
		
	/* ÜHENDUS */
	$database = "if16_kriskand_bemmid";
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	

?>