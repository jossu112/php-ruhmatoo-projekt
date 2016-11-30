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
		
		// kas �nnestus salvestada
		if($stmt->execute()){
			// �nnestus
			echo "kustutamine �nnestus!";
		}
		
		$stmt->close();
		
		
	}
		
	
	
	function getSingle($edit_id){

		$stmt = $this->connection->prepare("SELECT series, year, color, power FROM cars_and_colors1 WHERE id=? AND deleted IS NULL");

		$stmt->bind_param("i", $edit_id);
		$stmt->bind_result($series, $year, $color, $power);
		$stmt->execute();
		
		//tekitan objekti
		$car = new Stdclass();
		
		//saime �he rea andmeid
		if($stmt->fetch()){
			// saan siin alles kasutada bind_result muutujaid
			$car->series = $series;
			$car->year = $year;
			$car->color = $color;
			$car->power = $power;
			
			
		}else{
			// ei saanud rida andmeid k�tte
			// sellist id'd ei ole olemas
			// see rida v�ib olla kustutatud
			header("Location: data.php");
			exit();
		}
		
		$stmt->close();
		
		
		return $car;
		
	}

	function save ($series, $year, $color, $power, $gearbox) {
		
		$stmt = $this->connection->prepare("INSERT INTO cars (series, year, color, power, gearbox) VALUES (?, ?, ?, ?, ?)");
	
		echo $this->connection->error;
		
		$stmt->bind_param("sssss", $series, $year, $color, $power, $gearbox);
		
		if($stmt->execute()) {
			echo "salvestamine �nnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
		
	}
	
	function update($id, $series, $year, $color, $power, $gearbox){
    	
		$stmt = $this->connection->prepare("UPDATE cars SET series=?, year=?, color=?, power=?, gearbox=? WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("ssssi", $series, $year, $color, $power, $gearbox, $id);
		
		// kas �nnestus salvestada
		if($stmt->execute()){
			// �nnestus
			echo "salvestus �nnestus!";
		}
		
		$stmt->close();
		
		
	}
	
}
?>