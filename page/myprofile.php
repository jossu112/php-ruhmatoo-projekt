<?php
	
	require("../functions.php");
	
	require("../class/Car.class.php");
	$Car = new Car($mysqli);
	
	require("../class/Helper.class.php");
	$Helper = new Helper();
	
		//kui ei ole kasutaja id'd
	if (!isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: login.php");
		exit();
	}
	
	
	//kui on ?logout aadressireal siis login välja
	if (isset($_GET["logout"])) {
		
		session_destroy();
		header("Location: login.php");
		exit();
	}
	

	if ( isset($_POST["series"]) && 
		isset($_POST["year"]) && 
		isset($_POST["color"]) && 
		isset($_POST["power"]) && 
		isset($_POST["gearbox"]) &&
		!empty($_POST["series"]) && 
		!empty($_POST["year"]) && 
		!empty($_POST["color"]) && 
		!empty($_POST["power"]) &&
		!empty($_POST["gearbox"])
	  ) {
		 
		 //echo "siin";
		$Car->save($Helper->cleanInput($_POST["series"]), $Helper->cleanInput($_POST["year"]), $Helper->cleanInput($_POST["color"]), $Helper->cleanInput($_POST["power"]), $Helper->cleanInput($_POST["gearbox"])); 
		
	}
	$uploadOk = 0;
if(isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["name"])){
	
	

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
	//$imagename = basename( $_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
		
		
		
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            
            // save file name to DB here
			//saveimageurl
			
			
			$imagename = basename( $_FILES["fileToUpload"]["name"]);
			
			
			$Car->saveimagename ($imagename);
			//kuidagi nii saab failist pilti nime järgi kutsuda välja *style ei funktsioneeri		
			//echo "<img src=" .$target_dir. "/"	.$imagename. "style=width:350px;height:228px;>";
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>


<?php require("../header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-6">

			<html>
				<head>
					<title>Minu bemm</title>
				</head>
				<body>
					
					
					<h1>Informatsioon</h1>
					<form method="POST">
						
						Tagasi eelmisele lehele <a href="homepage.php"><?=$_SESSION["userEmail"];?>!</a>
						<br><br>
						<div class="form-group">
							<label for="series">Seeria</label><br>
							<select class="form-control" id="series" name="series">
							<option>114</option><option>116</option><option>118</option><option>120</option><option>123</option><option>125</option><option>130</option><option>135</option><option>216</option><option>218</option><option>220</option><option>225</option><option>M235</option><option>2000</option><option>2002</option><option>315</option><option>316</option><option>318</option><option>320</option><option>323</option><option>324</option><option>325</option><option>328</option><option>330</option><option>335</option><option>321</option><option>418</option><option>420</option><option>425</option><option>428</option><option>430</option><option>435</option><option>518</option><option>520</option><option>523</option><option>524</option><option>525</option><option>528</option><option>530</option><option>533</option><option>535</option><option>540</option><option>545</option><option>550</option><option>ActiveHybrid 5</option><option>M550</option><option>628</option><option>630</option><option>633</option><option>635</option><option>640</option><option>645</option><option>650</option><option>7 ActiveHybrid</option><option>725</option><option>728</option><option>730</option><option>732</option><option>733</option><option>735</option><option>740</option><option>745</option><option>750</option><option>760</option><option>840</option><option>850</option><option>C1</option><option>i3</option><option>i8</option><option>i9</option><option>1. seeria M Coupe</option><option>M1</option><option>M2</option><option>M3</option><option>M4</option><option>M5</option><option>M6</option><option>X4 M40i</option><option>X5 M</option><option>X6 M</option><option>Z4 M</option><option>X1</option><option>X3</option><option>X4</option><option>X5</option><option>X6</option><option>Z3</option><option>Z4</option><option>Z5</option><option>Z8</option>
							</select>
						<br><br>	
							<label>Käigukast</label><br>
							
							<select class="form-control" id="gearbox" name="gearbox">
							<option label="Manuaal">Manuaal</option>
							<option label="Automaat">Automaat</option>
							</select>
														
						</div>
						<br><br>
						
						<label>Aasta</label><br>
						<input class="form-control" name="year" type="year">
						<br><br>

							
						<label>Auto värv</label><br>
						<input class="form-control" name="color" type="text" >
						<br><br>
						
						<label>Võimsus(kw)</label><br>
						<input class="form-control" name="power" type="text">
						<br><br>
						
						
							
						<input class="btn btn-success" type="submit" value="SALVESTA" onclick="javascript:location.href=login.php">
						
						<br><br> 
						
					</form>
					
		</div>
		<div class="col-sm-6">
		<img src="Logo.png" alt="BWM logo" style="...">
		<br><br>
						
						<form action="myprofile.php" method="POST" enctype="multipart/form-data">
						Valige pilt:
						<input type="file" name="fileToUpload" id="fileToUpload">
						<br><br>
						<input class="btn btn-success" type="submit" value="Upload Image" name="submit">
						</form>
					
					<?php
					if ($uploadOk != 0) {				
						echo "<img src='" .$target_dir. "/"	.$imagename. "'>"; 
					} else {
						echo " ";
					}
					?>
					
						
					 
					
						
				</body>

			</html>
			</html>
		</div>
	</div>	
</div>	
<?php require("../footer.php"); ?>