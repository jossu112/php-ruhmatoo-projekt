<?php	
	require("../../../config.php");
	
	$signupEmail = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	
	// kas e-post oli olemas
	if (isset ($_POST["signupEmail"] ) )  {
		
		if ( empty ($_POST["signupEmail"] ) ) {
			
			// oli email, kuid see oli t�hi
			$signupEmailError = "See v�li on kohustuslik";
		
		}else{
			
			//email on �ige, salvestab v��rtuse muutujasse
			$signupEmail = $_POST["signupEmail"];
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
	
	// Kus tean et �htegi viga ei olnud ja saan kasutaja andmed salvestada
 	if ( isset($_POST["signupPassword"]) &&
 		 isset($_POST["signupEmail"]) &&	
 		 empty($signupEmailError) && 
 		 empty($signupPasswordError)
 	   ) {
 		
 		echo "Salvestan...<br>";
 		echo "email ".$signupEmail."<br>";
 		
 		$password = hash("sha512", $_POST["signupPassword"]);
 		
 		echo "parool ".$_POST["signupPassword"]."<br>";
 		echo "r�si ".$password."<br>";
 		
 		//echo $serverPassword;
 		
 		$database = "if16_kriskand_bemmid";
 		
 		//�hendus
 		$mysqli = new mysqli($serverHost,$serverUsername,$serverPassword,$database);
 		
 		//k�sk
 		$stmt = $mysqli->prepare("INSERT INTO signup (email, password, created) VALUES (?, ?, ?)");
 		
 		echo $mysqli->error;
 		
 		//asendan k�sim�rgi v��rtustega
 		//iga muutuja kohta 1 t�ht, mis t��pi muutuja on
 		// s - string
 		// i - integer
 		// d - double/float
 		$stmt->bind_param("sss", $signupEmail, $password, $created);
 		
 		if ($stmt->execute()) {
 				
 			echo "salvestamine �nnestus";
 	   } else {
 		   echo "ERROR ".$stmt->error;
 	   }
 	   
 	   
 		
 	}
	
	
	
	
?>

<h1>Loo kasutaja</h1>
<?php require("../header.php"); ?>

<div class="container">
    <div class="row">
        <div align="center">
		
			<div class="col-sm-4 col-md-3">

			<form method="POST">
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