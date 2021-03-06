USE SkillsDB;

CREATE TABLE IF NOT EXISTS Correction (
	CorrectionId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	SkillId INT NOT NULL,
	Problem VARCHAR(5000) NOT NULL,
	Reason VARCHAR(5000) NOT NULL,
	Correction VARCHAR(5000) NOT NULL,
	
	FOREIGN KEY (SkillId) REFERENCES Skill(SkillId)
);