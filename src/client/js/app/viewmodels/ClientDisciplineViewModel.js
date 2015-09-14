var ClientDisciplineViewModel = function(config) {
	var self = this;
	
	self.availableDisciplines = config.disciplineData;	
	self.availableSkills = ko.observable(null);
	self.selectedDiscipline = ko.observable(null);
	self.selectedSkill = ko.observable({});
	
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
			self.selectedSkill({});
		});
	});
	
	self.hasSkillSelected = ko.computed(function() {
		return !!self.selectedSkill().name;
	});
	
	self.selectSkill = function(skill) {
		self.selectedSkill(skill);
	};
		
	self.selectedSkillDescription = ko.computed(function() { return self.selectedSkill().description; });
	self.selectedSkillName = ko.computed(function() { return self.selectedSkill().name; });
	self.selectedSkillVideoUrl = ko.computed(function() { return self.selectedSkill().videoUrl; });
	
	self.availableCorrections = ko.computed(function() {
		return self.selectedSkill().corrections;
	});
};