<?php
class SkillMapper {
	function getAllSkillsForDiscipline($connection, $disciplineId) {
		$skillArray = array();

		$skillQuery = $connection->prepare("SELECT SkillId, DisciplineId, Name, Description, VideoUrl FROM Skill WHERE DisciplineId=?");
		$skillQuery->bind_param('i', $disciplineId);
		$skillQuery->execute();
		$result = $skillQuery->get_result();
		
		$correctionmapper = new CorrectionMapper();
		
		while($row = $result->fetch_assoc()) {
			$skill = new Skill();
			$skill->id = $row["SkillId"];
			$skill->disciplineId = $row["DisciplineId"];
			$skill->name = $row["Name"];
			$skill->description = $row["Description"];
			$skill->videoUrl = $row["VideoUrl"];
			
			$skill->corrections = $correctionmapper->getAllCorrectionsForSkill($connection, $skill->id);
			array_push($skillArray, $skill);
		}
		
		$skillQuery->close();
		
		return $skillArray;
	}
}
?>