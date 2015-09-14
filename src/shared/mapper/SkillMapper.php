<?php
class SkillMapper {
	function getAllSkillsForDiscipline($connection, $disciplineId) {
		$skillArray = array();

		$query = $connection->prepare("SELECT SkillId, DisciplineId, Name, Description, VideoUrl FROM Skill WHERE DisciplineId=?");
		$query->bind_param('i', $disciplineId);
		$query->execute();
		$result = $query->get_result();
		
		while($row = $result->fetch_assoc()) {
			$skill = new Skill();
			$skill->id = $row["SkillId"];
			$skill->disciplineId = $row["DisciplineId"];
			$skill->name = $row["Name"];
			$skill->description = $row["Description"];
			$skill->videoUrl = $row["VideoUrl"];
			array_push($skillArray, $skill);
		}
		
		$query->close();
		
		return $skillArray;
	}
}
?>