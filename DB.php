<?php
	Class DB {
		//Use ENV VAR for more safety
		private $host   = "localhost";
		private $db = "trello-clone";
		private $user   = "root";
		private $pass   = "";
		private $conn;

		public function __construct() {
			if($_ENV['CLEARDB_DATABASE_URL']) {
				$this->conn = new PDO($_ENV['CLEARDB_DATABASE_URL']);
			} else {
				$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
			}
		}

		public function getConnection() {
			return $this->conn;
		}
	}

?>
