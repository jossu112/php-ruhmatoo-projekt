
<?php require("../header.php"); ?>
<?php	
	
	$signupEmailError = "";
	$signupPasswordError = "";
	// kas e-post oli olemas
	if (isset ($_POST["signupEmail"] ) )  {
		
		if ( empty ($_POST["signupEmail"] ) ) {
			
			// oli email, kuid see oli t�hi
			$signupEmailError = "See v�li on kohustuslik";
		
		}
		
	}

	// kas parool oli olemas
	if (isset ($_POST["signupPassword"] ) ) {
		
		if ( empty ($_POST["signupPassword"] ) ) {
			
			$signupPasswordError = "See v�li on kohustuslik";
			
			//tean et parool ei olnud t�hi
			//V�HEMALT 8
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema v�hemalt 8 t�hem�rki";
			}
			
			
		}
		
			
	}
	
?>


<div class="container">
    <div class="row">
        <div align="center">
		
			<div class="col-sm-4 col-md-3">

			<form method="POST">
			<h1>Loo kasutaja</h1>
		
			<label>E-post</label><br>
			<div class="form-group">
			<input name="signupEmail" type ="email" placeholder="E-mail"> <?php echo $signupEmailError;?>
		
			<br> <br>
			<label>Password</label><br>
			<div class="form-group">
			<input name="signupPassword" type ="password" placeholder="Parool"> <?php echo $signupPasswordError;?>
			
			<br> <br>
			
			<input type="submit" value="Loo kasutaja">
		</form>
<?php require("../footer.php"); ?>