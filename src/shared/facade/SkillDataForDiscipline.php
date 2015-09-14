<?php
	include "../model/Skill.php";
	include "../model/Correction.php";
	include "../mapper/Database.php";
	include "../mapper/SkillMapper.php";
	include "../mapper/CorrectionMapper.php";

	$disciplineId = $_REQUEST['disciplineId'];
	
	$database = new Database();
	$database->connect();

	$skillMapper = new SkillMapper();
	$skillArray = $skillMapper->getAllSkillsForDiscipline($database->connection, (int) $disciplineId);
	
	echo json_encode($skillArray);
	
	$database->close();
?>