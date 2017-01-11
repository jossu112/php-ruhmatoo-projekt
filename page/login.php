<nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="#">
    <img src="Logo.png" width="60" height="60" alt="BMW logo">
  </a>
</nav>
<?php

	require("../functions.php");
	require("../class/Helper.class.php");
	$Helper = new Helper();
	require("../class/User.class.php");
	$User = new User($mysqli);
	
	if (isset ($_SESSION["userId"])){
		
			header("Location: homepage.php");
			exit();
	}
	
	if ( isset($_POST["loginEmail"]) &&
		 isset($_POST["loginPassword"]) &&
		 !empty($_POST["loginEmail"]) &&
		 !empty($_POST["loginPassword"])
	  ) {
		
		//login sisse
		$error = $User->login($Helper->cleanInput($_POST["loginEmail"]), $Helper->cleanInput($_POST["loginPassword"]));
		
	}
?>

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
			
			<input type="submit" value="Logi sisse" class="btn btn-success">
			<br><br>
			
			
			<a href = "signup.php" class="btn btn-danger" > Loo kasutaja </a>
			
		</form>
		
		
		
		</div>
    </div>
</div>			
	</body>
</html>
<?php require("../footer.php"); ?>