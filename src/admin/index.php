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
		
		<script type="text/javascript" src="/admin/js/app/viewmodels/AdminDisciplineViewModel.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
					var config = {
						disciplineData: <?php echo $jsonDiscipline; ?>
					};
					var viewModel = new AdminDisciplineViewModel(config);
					
					ko.applyBindings(viewModel);
			});
		</script>
	</head>
	<body>
		<div class="left-menu">
			<select id="DisciplineDropDownList" 
				data-bind="options: availableDisciplines, optionsText: 'name', value: selectedDiscipline, 
				optionsCaption: 'Select a discipline...'"></select>
		</div>
		<div class="main">
			<span data-bind="text: selectedDisciplineDescription"></span>
		</div>
	</body>
</html>