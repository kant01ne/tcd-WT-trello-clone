<?php
	Class DB {
		//Use ENV VAR for more safety
		private $host   = $_ENV['DB_HOST'] || "localhost";
		private $db = "trello-clone";
		private $user   = $_ENV['DB_USER'] || "root";
		private $pass   = $_ENV['DB_PASSWORD'] || "";
		private $conn;

		public function __construct() {
			if($_ENV['CLEARDB_DATABASE_URL'])
				$this->conn = new PDO($_ENV['CLEARDB_DATABASE_URL']);
			else {
				$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
			}
		}

		public function getConnection() {
			return $this->conn;
		}
	}

?>
