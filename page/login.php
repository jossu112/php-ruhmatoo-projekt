<!DOCTYPE html>
<?php require("../header.php"); ?>
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST">
		
			<label>E-post</label><br>
			<input name="loginEmail" type ="email" placeholder="E-mail">
		
			<br> <br>
			
			<input name="loginPassword" type ="password" placeholder="Parool">
			
			<br> <br>
			
			<input type="submit" value="Logi sisse">
			<br><br>
			
			
			<a href = "signup.php" > Loo kasutaja </a>
			
		</form>
		
		
		
			
	</body>
</html>
<?php require("../footer.php"); ?>