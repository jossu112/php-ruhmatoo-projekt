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
	
	function get($sort, $order) {
		
		$allowedSort = ["series", "year", "color", "power", "gearbox", "imagename"];
		
		if(!in_array($sort, $allowedSort)){
			//ei ole lubatud tulp
			$sort = "year";
		}
		
		$orderBy = "ASC";
		
		if($order == "DESC"){
			$orderBy = "DESC";
		}
		
		
			$stmt = $this->connection->prepare("
				SELECT series, year, color, power, gearbox, imagename
				FROM cars
				WHERE user_id=$_SESSION[userId] AND deleted IS NULL
				ORDER BY $sort $orderBy
			");
		
	
		
		echo $this->connection->error;
		
		$stmt->bind_result($series, $year, $color, $power, $gearbox, $imagename);
		$stmt->execute();
		
		
		//tekitan massiivi
		$result = array();
		
		// tee seda seni, kuni on rida andmeid
		// mis vastab select lausele
		while ($stmt->fetch()) {
			
			//tekitan objekti
			$car = new StdClass();
			
			$car->series = $series;
			$car->year = $year;
			$car->color = $color;
			$car->power = $power;
			$car->gearbox = $gearbox;
			$car->imagename = $imagename;
			
			//echo $plate."<br>";
			// iga kord massiivi lisan juurde nr m�rgi
			array_push($result, $car);
		}
		
		$stmt->close();
		
		
		return $result;
	}
		
	
	
	function getSingle($edit_id){

		$stmt = $this->connection->prepare("SELECT series, year, color, power, gearbox FROM cars WHERE id=? AND deleted IS NULL");

		$stmt->bind_param("i", $edit_id);
		$stmt->bind_result($series, $year, $color, $power, $gearbox);
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
			$car->gearbox = $gearbox;
			
			
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

	function save	($series, $year, $color, $power, $gearbox) {
		
		$stmt = $this->connection->prepare("INSERT INTO cars (series, year, color, power, gearbox, user_id) VALUES (?, ?, ?, ?, ?, ?)");
	
		echo $this->connection->error;
		
		$stmt->bind_param("sisisi", $series, $year, $color, $power, $gearbox, $_SESSION["userId"]);
		if (mysql_errno() == 1062) {
			echo "no way!";
		}
		
		if($stmt->execute()) {
			echo "salvestamine �nnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
	}

	function saveimagename	($imagename) {
		
		$stmt = $this->connection->prepare("UPDATE cars SET imagename=? WHERE user_id=? AND deleted IS NULL");
	
		
		
		$stmt->bind_param("si", $imagename, $_SESSION["userId"]);
		
		if($stmt->execute()) {
			echo "<br>Pildi salvestamine �nnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
	}	
	
	function updateCar($id, $series, $year, $color, $power, $gearbox){
    	
		$stmt = $this->connection->prepare("UPDATE cars SET series=?, year=?, color=?, power=?, gearbox=? WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("sisisi", $id, $series, $year, $color, $power, $gearbox);
		
		// kas �nnestus salvestada
		if($stmt->execute()){
			// �nnestus
			echo "salvestus �nnestus!";
		}
		
		$stmt->close();
		
		
	}
	
}
?>