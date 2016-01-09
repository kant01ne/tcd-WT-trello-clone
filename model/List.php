<?php
	include '../DB.php';
	include 'model/Card.php';
	
	//List is a reserved word
	Class TList {
		private $id;
		private $name;
		private $description;
		private $board_id;

		public function __construct ($name, $description, $board_id) {
			if($name) $this->name = $name;
			if($description) $this->description = $description;
			if($board_id) $this->board_id = $board_id;
		}

		public function getId() {
			return $this->id;
		}
		
		public function getName() {
			return $this->name;
		}

		public function getDescription() {
			return $this->description;
		}

		public function getBoardId() {
			return $this->board_id;
		}

		public function output() {
			require(__ROOT__."/template/List.php");
		}

		public function getCards() {
			try{
				$db = new DB();
				$query=$db->getConnection()->prepare("Select * from card where list_id=?");
				if($query->execute(array($this->id))) {
					return $query->fetchAll(PDO::FETCH_CLASS,"Card");
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}		
		}
	}
?>