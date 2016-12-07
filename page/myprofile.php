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

if(isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["name"])){
	

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
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
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            
            // save file name to DB here
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
?>










<?php require("../header.php"); ?>

<html>
	<head>
		<title>Minu bemm</title>
	</head>
	<body>

		<h1>Informatsioon</h1>
		<form method="POST">
			
			Tagasi eelmisele lehele <a href="homepage.php"><?=$_SESSION["userEmail"];?>!</a>
			<br><br>
			
			<label>Seeria</label><br>
			<select name="series"> <option class="input-option" value="kõik">kõik</option><option value="881" class="level-0" label="1 seeria (kõik)">1 seeria (kõik)</option><option value="114" class="level-1" label="114">114</option><option value="116" class="level-1" label="116">116</option><option value="118" class="level-1" label="118">118</option><option value="120" class="level-1" label="120">120</option><option value="123" class="level-1" label="123">123</option><option value="125" class="level-1" label="125">125</option><option value="130" class="level-1" label="130">130</option><option value="135" class="level-1" label="135">135</option><option value="2223" class="level-0" label="2. seeria (kõik)">2. seeria (kõik)</option><option value="216" class="level-1" label="216">216</option><option value="218" class="level-1" label="218">218</option><option value="220" class="level-1" label="220">220</option><option value="225" class="level-1" label="225">225</option><option value="M235" class="level-1" label="M235">M235</option><option value="2000" class="level-0" label="2000">2000</option><option value="2002" class="level-0" label="2002">2002</option><option value="18" class="level-0" label="3 seeria (kõik)">3 seeria (kõik)</option><option value="315" class="level-1" label="315">315</option><option value="316" class="level-1" label="316">316</option><option value="318" class="level-1" label="318">318</option><option value="320" class="level-1" label="320">320</option><option value="323" class="level-1" label="323">323</option><option value="324" class="level-1" label="324">324</option><option value="325" class="level-1" label="325">325</option><option value="328" class="level-1" label="328">328</option><option value="330" class="level-1" label="330">330</option><option value="335" class="level-1" label="335">335</option><option value="321" class="level-0" label="321">321</option><option value="2204" class="level-0" label="4. seeria (kõik)">4. seeria (kõik)</option><option value="418" class="level-1" label="418">418</option><option value="420" class="level-1" label="420">420</option><option value="425" class="level-1" label="425">425</option><option value="428" class="level-1" label="428">428</option><option value="430" class="level-1" label="430">430</option><option value="435" class="level-1" label="435">435</option><option value="244" class="level-0" label="5 seeria (kõik)">5 seeria (kõik)</option><option value="518" class="level-1" label="518">518</option><option value="520" class="level-1" label="520">520</option><option value="523" class="level-1" label="523">523</option><option value="524" class="level-1" label="524">524</option><option value="525" class="level-1" label="525">525</option><option value="528" class="level-1" label="528">528</option><option value="530" class="level-1" label="530">530</option><option value="533" class="level-1" label="533">533</option><option value="535" class="level-1" label="535">535</option><option value="540" class="level-1" label="540">540</option><option value="545" class="level-1" label="545">545</option><option value="550" class="level-1" label="550">550</option><option value="ActiveHybrid 5" class="level-1" label="ActiveHybrid 5">ActiveHybrid 5</option><option value="M550" class="level-1" label="M550">M550</option><option value="331" class="level-0" label="6 seeria (kõik)">6 seeria (kõik)</option><option value="628" class="level-1" label="628">628</option><option value="630" class="level-1" label="630">630</option><option value="633" class="level-1" label="633">633</option><option value="635" class="level-1" label="635">635</option><option value="640" class="level-1" label="640">640</option><option value="645" class="level-1" label="645">645</option><option value="650" class="level-1" label="650">650</option><option value="7" class="level-0" label="7 seeria (kõik)">7 seeria (kõik)</option><option value="ActiveHybrid" class="level-1" label="7 ActiveHybrid">7 ActiveHybrid</option><option value="725" class="level-1" label="725">725</option><option value="728" class="level-1" label="728">728</option><option value="730" class="level-1" label="730">730</option><option value="732" class="level-1" label="732">732</option><option value="733" class="level-1" label="733">733</option><option value="735" class="level-1" label="735">735</option><option value="740" class="level-1" label="740">740</option><option value="745" class="level-1" label="745">745</option><option value="750" class="level-1" label="750">750</option><option value="760" class="level-1" label="760">760</option><option value="1403" class="level-0" label="8 seeria (kõik)">8 seeria (kõik)</option><option value="840" class="level-1" label="840">840</option><option value="850" class="level-1" label="850">850</option><option value="C1" class="level-0" label="C1">C1</option><option value="i3" class="level-0" label="i3">i3</option><option value="i8" class="level-0" label="i8">i8</option><option value="i9" class="level-0" label="i9">i9</option><option value="28" class="level-0" label="M seeria (kõik)">M seeria (kõik)</option><option value="1. seeria M Coupe" class="level-1" label="1. seeria M Coupe">1. seeria M Coupe</option><option value="M1" class="level-1" label="M1">M1</option><option value="M2" class="level-1" label="M2">M2</option><option value="M3" class="level-1" label="M3">M3</option><option value="M4" class="level-1" label="M4">M4</option><option value="M5" class="level-1" label="M5">M5</option><option value="M6" class="level-1" label="M6">M6</option><option value="X4 M40i" class="level-1" label="X4 M40i">X4 M40i</option><option value="X5 M" class="level-1" label="X5 M">X5 M</option><option value="X6 M" class="level-1" label="X6 M">X6 M</option><option value="Z4 M" class="level-1" label="Z4 M">Z4 M</option><option value="X1" class="level-0" label="X1">X1</option><option value="X3" class="level-0" label="X3">X3</option><option value="X4" class="level-0" label="X4">X4</option><option value="X5" class="level-0" label="X5">X5</option><option value="X6" class="level-0" label="X6">X6</option><option value="Z3" class="level-0" label="Z3">Z3</option><option value="Z4" class="level-0" label="Z4">Z4</option><option value="Z5" class="level-0" label="Z5">Z5</option><option value="Z8" class="level-0" label="Z8">Z8</option></select>	
			<br><br>
			
			<label>Aasta</label><br>
			<input name="year" type="year">
			<br><br>

				
			<label>Auto värv</label><br>
			<input name="color" type="text" >
			<br><br>
			
			<label>Võimsus(kw)</label><br>
			<input name="power" type="text">
			<br><br>
			
			<label>Käigukast</label><br>
			
			<select name="gearbox">
			<option label="Manuaal">Manuaal</option>
			<option label="Automaat">Automaat</option>
			</select>
			<br><br>
			
				
			<input type="submit" value="SALVESTA">
			
			<br><br> 

		</form>
		
		<form action="myprofile.php" method="POST" enctype="multipart/form-data">
			Valige pilt:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br>
			<input type="submit" value="Upload Image" name="submit">
		</form>		
		
			
	</body>

</html>
</html>
<?php require("../footer.php"); ?>

