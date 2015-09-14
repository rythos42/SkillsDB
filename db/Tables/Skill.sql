USE SkillsDB;

CREATE TABLE IF NOT EXISTS Skill (
	SkillId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	DisciplineId INT NOT NULL,
	Name VARCHAR(100) NOT NULL,
	Description VARCHAR(5000) NOT NULL,
	VideoUrl VARCHAR(256) NOT NULL,
	
	FOREIGN KEY(DisciplineId) REFERENCES Discipline(DisciplineId)
);