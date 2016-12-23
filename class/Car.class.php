<?php 
class Car {
	
	private $connection;
	
	function __construct($mysqli){
		
		$this->connection = $mysqli;
		
	}

	/*TEISED FUNKTSIOONID */
	function delete($id){

		$stmt = $this->connection->prepare("UPDATE cars SET deleted=NOW() WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("i",$id);
		
		// kas õnnestus salvestada
		if($stmt->execute()){
			// õnnestus
			echo "kustutamine õnnestus!";
		}
		
		$stmt->close();
		
		
	}
		
	
	
	function getSingle($edit_id){

		$stmt = $this->connection->prepare("SELECT series, year, color, power, gearbox FROM cars WHERE id=? AND deleted IS NULL");

		$stmt->bind_param("i", $edit_id);
		$stmt->bind_result($series, $year, $color, $power, $gearbox);
		$stmt->execute();
		
		//tekitan objekti
		$car = new Stdclass();
		
		//saime ühe rea andmeid
		if($stmt->fetch()){
			// saan siin alles kasutada bind_result muutujaid
			$car->series = $series;
			$car->year = $year;
			$car->color = $color;
			$car->power = $power;
			$car->gearbox = $gearbox;
			
			
		}else{
			// ei saanud rida andmeid kätte
			// sellist id'd ei ole olemas
			// see rida võib olla kustutatud
			header("Location: data.php");
			exit();
		}
		
		$stmt->close();
		
		
		return $car;
		
	}

	function save	($series, $year, $color, $power, $gearbox) {
		
		$stmt = $this->connection->prepare("INSERT INTO cars (series, year, color, power, gearbox, user_id) VALUES (?, ?, ?, ?, ?, ?)");
	
		echo $this->connection->error;
		
		$stmt->bind_param("sisisi", $series, $year, $color, $power, $gearbox, $_SESSION["userId"]);
		if (mysql_errno() == 1062) {
			echo 'no way!';
		}
		if($stmt->execute()) {
			echo "salvestamine õnnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
	}

	function saveimagename	($imagename) {
		
		$stmt = $this->connection->prepare("UPDATE cars SET imagename=? WHERE user_id=? AND deleted IS NULL");
	
		
		
		$stmt->bind_param("si", $imagename, $_SESSION["userId"]);
		
		if($stmt->execute()) {
			echo "<br>Pildi salvestamine õnnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
	}	
	
	function updateCar($id, $series, $year, $color, $power, $gearbox){
    	
		$stmt = $this->connection->prepare("UPDATE cars SET series=?, year=?, color=?, power=?, gearbox=? WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("sisisi", $id, $series, $year, $color, $power, $gearbox);
		
		// kas õnnestus salvestada
		if($stmt->execute()){
			// õnnestus
			echo "salvestus õnnestus!";
		}
		
		$stmt->close();
		
		
	}
	
}
?>