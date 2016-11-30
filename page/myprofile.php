<?php
	
	require("../functions.php");
	
	require("../class/Car.class.php");
	$Car = new Car($mysqli);
	
	require("../class/Helper.class.php");
	$Helper = new Helper();
	
	
	
	
	
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
			
			<label>Seeria</label><br>
			<select name="series"> <option class="input-option" value="kõik">kõik</option><option value="881" class="level-0" label="1 seeria (kõik)">1 seeria (kõik)</option><option value="2407" class="level-1" label="114">114</option><option value="1181" class="level-1" label="116">116</option><option value="1182" class="level-1" label="118">118</option><option value="1168" class="level-1" label="120">120</option><option value="1169" class="level-1" label="123">123</option><option value="1895" class="level-1" label="125">125</option><option value="1183" class="level-1" label="130">130</option><option value="1167" class="level-1" label="135">135</option><option value="2223" class="level-0" label="2. seeria (kõik)">2. seeria (kõik)</option><option value="2369" class="level-1" label="216">216</option><option value="2302" class="level-1" label="218">218</option><option value="2301" class="level-1" label="220">220</option><option value="2303" class="level-1" label="225">225</option><option value="2341" class="level-1" label="M235">M235</option><option value="2260" class="level-0" label="2000">2000</option><option value="330" class="level-0" label="2002">2002</option><option value="18" class="level-0" label="3 seeria (kõik)">3 seeria (kõik)</option><option value="1171" class="level-1" label="315">315</option><option value="1172" class="level-1" label="316">316</option><option value="1165" class="level-1" label="318">318</option><option value="1173" class="level-1" label="320">320</option><option value="1174" class="level-1" label="323">323</option><option value="1176" class="level-1" label="324">324</option><option value="1177" class="level-1" label="325">325</option><option value="1178" class="level-1" label="328">328</option><option value="1179" class="level-1" label="330">330</option><option value="1180" class="level-1" label="335">335</option><option value="2559" class="level-0" label="321">321</option><option value="2204" class="level-0" label="4. seeria (kõik)">4. seeria (kõik)</option><option value="2330" class="level-1" label="418">418</option><option value="2326" class="level-1" label="420">420</option><option value="2327" class="level-1" label="425">425</option><option value="2324" class="level-1" label="428">428</option><option value="2328" class="level-1" label="430">430</option><option value="2325" class="level-1" label="435">435</option><option value="244" class="level-0" label="5 seeria (kõik)">5 seeria (kõik)</option><option value="1184" class="level-1" label="518">518</option><option value="1185" class="level-1" label="520">520</option><option value="1186" class="level-1" label="523">523</option><option value="1190" class="level-1" label="524">524</option><option value="1187" class="level-1" label="525">525</option><option value="1188" class="level-1" label="528">528</option><option value="1189" class="level-1" label="530">530</option><option value="1193" class="level-1" label="533">533</option><option value="1191" class="level-1" label="535">535</option><option value="1194" class="level-1" label="540">540</option><option value="1405" class="level-1" label="545">545</option><option value="1195" class="level-1" label="550">550</option><option value="2406" class="level-1" label="ActiveHybrid 5">ActiveHybrid 5</option><option value="2332" class="level-1" label="M550">M550</option><option value="331" class="level-0" label="6 seeria (kõik)">6 seeria (kõik)</option><option value="2224" class="level-1" label="628">628</option><option value="1197" class="level-1" label="630">630</option><option value="2405" class="level-1" label="633">633</option><option value="1199" class="level-1" label="635">635</option><option value="2095" class="level-1" label="640">640</option><option value="1196" class="level-1" label="645">645</option><option value="1198" class="level-1" label="650">650</option><option value="7" class="level-0" label="7 seeria (kõik)">7 seeria (kõik)</option><option value="2263" class="level-1" label="7 ActiveHybrid">7 ActiveHybrid</option><option value="1201" class="level-1" label="725">725</option><option value="1202" class="level-1" label="728">728</option><option value="1203" class="level-1" label="730">730</option><option value="1204" class="level-1" label="732">732</option><option value="1205" class="level-1" label="733">733</option><option value="1206" class="level-1" label="735">735</option><option value="1207" class="level-1" label="740">740</option><option value="1208" class="level-1" label="745">745</option><option value="1209" class="level-1" label="750">750</option><option value="1210" class="level-1" label="760">760</option><option value="1403" class="level-0" label="8 seeria (kõik)">8 seeria (kõik)</option><option value="2030" class="level-1" label="840">840</option><option value="332" class="level-1" label="850">850</option><option value="88" class="level-0" label="C1">C1</option><option value="2121" class="level-0" label="i3">i3</option><option value="2122" class="level-0" label="i8">i8</option><option value="2404" class="level-0" label="i9">i9</option><option value="28" class="level-0" label="M seeria (kõik)">M seeria (kõik)</option><option value="2093" class="level-1" label="1. seeria M Coupe">1. seeria M Coupe</option><option value="2176" class="level-1" label="M1">M1</option><option value="2428" class="level-1" label="M2">M2</option><option value="1175" class="level-1" label="M3">M3</option><option value="2329" class="level-1" label="M4">M4</option><option value="1192" class="level-1" label="M5">M5</option><option value="1200" class="level-1" label="M6">M6</option><option value="2427" class="level-1" label="X4 M40i">X4 M40i</option><option value="1992" class="level-1" label="X5 M">X5 M</option><option value="1993" class="level-1" label="X6 M">X6 M</option><option value="1211" class="level-1" label="Z4 M">Z4 M</option><option value="2010" class="level-0" label="X1">X1</option><option value="809" class="level-0" label="X3">X3</option><option value="2222" class="level-0" label="X4">X4</option><option value="21" class="level-0" label="X5">X5</option><option value="1161" class="level-0" label="X6">X6</option><option value="333" class="level-0" label="Z3">Z3</option><option value="252" class="level-0" label="Z4">Z4</option><option value="2460" class="level-0" label="Z5">Z5</option><option value="39" class="level-0" label="Z8">Z8</option></select>	
			<br><br>
			
			<label>Aasta</label><br>
			<input name="year" type="year">
			<br><br>

				
			<label>Auto värv</label><br>
			<input type="text" name="color">
			<br><br>
			
			<label>Võimsus(kw)</label><br>
			<input name="power" type="text">
			<br><br>
			
			<label>Käigukast</label><br>
			
			<select name="gearbox">
			<option label="Manuaal"></option>
			<option label="Automaat"></option>
			</select>
			<br><br>
			
				
			<input type="submit" value="SALVESTA">
			
			<br><br> 

		</form>
		
		<form action="myprofile.php" method="POST" enctype="multipart/form-data">
			Valige pilt:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>		
		
			
	</body>

</html>
</html>
<?php require("../footer.php"); ?>

