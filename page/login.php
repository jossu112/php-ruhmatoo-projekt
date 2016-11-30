<!DOCTYPE html>
<?php require("../header.php"); ?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="Logo.png" alt="BWM logo" style="...">
        </div>
        <div class="col-md-3">
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
			<div class="form-group">
			<input name="loginPassword" type ="password" placeholder="Parool">
			
			<br> <br>
			
			<input type="submit" value="Logi sisse">
			<br><br>
			
			
			<a href = "signup.php" > Loo kasutaja </a>
			
		</form>
		
		
		
		</div>
    </div>
</div>			
	</body>
</html>
<?php require("../footer.php"); ?>