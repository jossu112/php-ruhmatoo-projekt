<?php	
	require("../../../config.php");
	
	$signupEmail = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	
	// kas e-post oli olemas
	if (isset ($_POST["signupEmail"] ) )  {
		
		if ( empty ($_POST["signupEmail"] ) ) {
			
			// oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik";
		
		}else{
			
			//email on õige, salvestab väärtuse muutujasse
			$signupEmail = $_POST["signupEmail"];
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
	
	// Kus tean et ühtegi viga ei olnud ja saan kasutaja andmed salvestada
 	if ( isset($_POST["signupPassword"]) &&
 		 isset($_POST["signupEmail"]) &&	
 		 empty($signupEmailError) && 
 		 empty($signupPasswordError)
 	   ) {
 		
 		echo "Salvestan...<br>";
 		echo "email ".$signupEmail."<br>";
 		
 		$password = hash("sha512", $_POST["signupPassword"]);
 		
 		echo "parool ".$_POST["signupPassword"]."<br>";
 		echo "räsi ".$password."<br>";
 		
 		//echo $serverPassword;
 		
 		$database = "if16_kriskand_bemmid";
 		
 		//ühendus
 		$mysqli = new mysqli($serverHost,$serverUsername,$serverPassword,$database);
 		
 		//käsk
 		$stmt = $mysqli->prepare("INSERT INTO signup (email, password, created) VALUES (?, ?, ?)");
 		
 		echo $mysqli->error;
 		
 		//asendan küsimärgi väärtustega
 		//iga muutuja kohta 1 täht, mis tüüpi muutuja on
 		// s - string
 		// i - integer
 		// d - double/float
 		$stmt->bind_param("sss", $signupEmail, $password, $created);
 		
 		if ($stmt->execute()) {
 				
 			echo "salvestamine õnnestus";
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