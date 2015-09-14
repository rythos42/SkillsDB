<!DOCTYPE html>
<html>
	<head>
		<?php
		include "../shared/model/Discipline.php";
		include "../shared/mapper/Database.php";
		include "../shared/mapper/DisciplineMapper.php";
		$database = new Database();
		$database->connect();

		$disciplineMapper = new DisciplineMapper();
		$disciplineArray = $disciplineMapper->getAllDisciplines($database->connection);
		
		$jsonDiscipline = json_encode($disciplineArray);
		
		
		$database->close();
		?>
		
		<script type="text/javascript" src="../shared/js/lib/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="../shared/js/lib/knockout-3.3.0.min.js"></script>
		<script type="text/javascript" src="../shared/js/lib/underscore-1.8.3.min.js"></script>
		
		<script type="text/javascript" src="/client/js/app/viewmodels/ClientDisciplineViewModel.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
					var config = {
						disciplineData: <?php echo $jsonDiscipline; ?>
					};
					var viewModel = new ClientDisciplineViewModel(config);
					
					ko.applyBindings(viewModel);
			});
		</script>
		
		<link rel="stylesheet" type="text/css" href="/client/css/style.css" />
	</head>
	<body>
		<div class="container">
			<div class="left-menu">
				<select id="DisciplineDropDownList" 
					data-bind="options: availableDisciplines, optionsText: 'name', value: selectedDiscipline, optionsCaption: 'Select a discipline...'"></select>
					
				<div class="skill-list" data-bind="foreach: availableSkills">
					<a href="#" data-bind="text: name, click: $root.selectSkill"></a>
				</div>
			</div>
			<div class="main">
				<div class="discipline-content">
					<span data-bind="text: selectedDisciplineDescription"></span>
				</div>
				
				<div class="skill-content" data-bind="visible: hasSkillSelected">				
					<span data-bind="text: selectedSkillDescription"></span>
					<span data-bind="text: selectedSkillName"></span>
					<span data-bind="text: selectedSkillVideoUrl"></span>
					
					<div class="corrections-content">
						<table>
							<thead>
								<tr>
									<th>Problem</th>
									<th>Reason</th>
									<th>Correction</th>
								</tr>
							</thead>
							<tbody data-bind="foreach: availableCorrections">
								<tr>
									<td data-bind="text: problem"></td>
									<td data-bind="text: reason"></td>
									<td data-bind="text: correction"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>