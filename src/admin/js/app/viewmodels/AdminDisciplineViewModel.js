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
};