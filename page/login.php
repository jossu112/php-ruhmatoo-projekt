<!DOCTYPE html>
<?php require("../header.php"); ?>



<div class="container">
    <div class="row">
        <div align="center">
		
			<div class="col-sm-4 col-md-3">
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST">
		
			<label>E-post</label><br>
			<div class="form-group">
			<input name="loginEmail" type ="email" placeholder="E-mail">
		
			<br> <br>
			<label>Parool</label><br>

			<input name="loginPassword" type ="password" placeholder="Parool">
			
			<br> <br>
			
			<input type="submit" value="Logi sisse">
			<br><br>
			
			
			<a href = "signup.php" > Loo kasutaja </a>
			
		</form>
		
		
		
			
	</body>
</html>
<?php require("../footer.php"); ?>