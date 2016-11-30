
<?php require("../header.php"); ?>
<?php	
	
	$signupEmailError = "";
	$signupPasswordError = "";
	// kas e-post oli olemas
	if (isset ($_POST["signupEmail"] ) )  {
		
		if ( empty ($_POST["signupEmail"] ) ) {
			
			// oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik";
		
		}
		
	}

	// kas parool oli olemas
	if (isset ($_POST["signupPassword"] ) ) {
		
		if ( empty ($_POST["signupPassword"] ) ) {
			
			$signupPasswordError = "See väli on kohustuslik";
			
			//tean et parool ei olnud tühi
			//VÄHEMALT 8
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki";
			}
			
			
		}
		
			
	}
	
?>

<h1>Loo kasutaja</h1>

<form method="POST">
		
			<label>E-post</label><br>
			<input name="signupEmail" type ="email" placeholder="E-mail"> <?php echo $signupEmailError;?>
		
			<br> <br>
			<label>Password</label><br>
			<input name="signupPassword" type ="password" placeholder="Parool"> <?php echo $signupPasswordError;?>
			
			<br> <br>
			
			<input type="submit" value="Loo kasutaja">
		</form>
<?php require("../footer.php"); ?>