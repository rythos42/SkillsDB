<?php
	include "../model/Skill.php";
	include "../mapper/Database.php";
	include "../mapper/SkillMapper.php";

	$disciplineId = $_REQUEST['disciplineId'];
	
	$database = new Database();
	$database->connect();

	$skillMapper = new SkillMapper();
	$skillArray = $skillMapper->getAllSkillsForDiscipline($database->connection, (int) $disciplineId);
	
	echo json_encode($skillArray);
	
	$database->close();
?>