<?php
class DisciplineMapper {
	function getAllDisciplines($connection) {
		$disciplineArray = array();
		$result = $connection->query("SELECT DisciplineId, Name, Description FROM Discipline");

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$discipline = new Discipline();
				$discipline->id = $row["DisciplineId"];
				$discipline->name = $row["Name"];
				$discipline->description = $row["Description"];
				array_push($disciplineArray, $discipline);
			}
		}
		
		return $disciplineArray;
	}
}
?>