<?php
class Database {
	var $connection;
	
	function connect() {
		$servername = "localhost";
		$username = "root";
		$password = "blyrble";
		$dbname = "SkillsDB";

		$this->connection = new mysqli($servername, $username, $password, $dbname);

		if ($this->connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		} 
	}
	
	function close() {
		$this->connection->close();
	}
}
?>