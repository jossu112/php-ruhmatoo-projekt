<!DOCTYPE html>
<?php require("../header.php"); ?>

<nav class="navbar navbar-light bg-faded navbar-fixed-top" style="background-color: rgba(30, 144, 255, 0.33)">
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="sighnup.php" style="color: red"><span class="glyphicon glyphicon-fire"></span> NORM BEMM</a>
        </li>
        
    </ul>
    <div class="collapse navbar-collapse">

   

        </form>
    </div>
</nav>


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