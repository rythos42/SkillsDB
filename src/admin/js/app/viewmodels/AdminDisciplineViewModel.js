var AdminDisciplineViewModel = function(config) {
	var self = this;
	
	self.availableDisciplines = config.disciplineData;	
	self.selectedDiscipline = ko.observable(null);
	
	self.selectedDisciplineDescription = ko.computed(function() {
		var selectedDiscipline = self.selectedDiscipline();
		if(!selectedDiscipline)
			return '';
		
		return selectedDiscipline.description;
	});
	
	self.selectedDiscipline.subscribe(function(newDiscipline) {
		if(!newDiscipline)
			return;
		
		$.ajax({
			url: '/shared/facade/SkillDataForDiscipline.php?disciplineId=' + newDiscipline.id
		}).done(function(result) {
			self.availableSkills($.parseJSON(result));
		});
	});
	
	self.availableSkills = ko.observable(null);
};