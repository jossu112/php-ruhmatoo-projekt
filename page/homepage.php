

<?php require("../header.php"); 
	
	require("../class/User.class.php");
	
	
	require("../functions.php");
		
	//kas ?logout on aadressireal?
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
	}
?>
<div class="container">
	
			<div class="row">


<h1>Norm Bemm</h1>







<p>
						
		<div class="container">
	
			<div class="row">				
						
				
	
	Tere tulemast <a href="myprofile.php"><?=$_SESSION["userEmail"];?>!</a>
	<a href="?logout=1">Logi välja</a>
</p>




<h2>Top 5</h2>
<br><br>
<h2>Minu Bemm</h2>
<br><br>
<h2>Hinda Bemme</h2>
<br><br>
<?php require("../footer.php"); ?>