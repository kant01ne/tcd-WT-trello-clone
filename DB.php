<?php
	Class DB {
		//Use ENV VAR for more safety
		private $host   = "localhost";
		private $db = "trello-clone";
		private $user   = "root";
		private $pass   = "";
		private $conn;

		public function __construct() {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
		}

		public function getConnection() {
			return $this->conn;
		}
	}

?>
