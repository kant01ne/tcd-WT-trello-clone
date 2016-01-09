<?php
	include 'model/List.php';

	Class Board {
		private $id;
		private $name;
		private $description;
		private $owner_id;
		private $lists;

		public function __construct ($name, $description, $owner_id) {
			if($name) $this->name = $name;
			if($description) $this->description = $description;
			if($owner_id) $this->owner_id = $owner_id;
		}

		public function load($id) {
			try{
				$db = new DB();
				$query=$db->getConnection()->prepare("Select * from board where id=?");
				if($query->execute(array($id))) {
					$res = $query->fetch(PDO::FETCH_OBJ);
					$this->id = $res->id;
					$this->name = $res->name;
					$this->description = $res->description;
					$this->owner_id = $res->owner_id;
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
		
		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getName() {
			return $this->name;
		}

		public function setName($name) {
			$this->name = $name;
		}

		public function getDescription() {
			return $this->description;
		}

		public function setDescription($description) {
			$this->description = $description;
		}
		
		public function getOwnerId() {
			return $this->owner_id;
		}

		public function setOwnerId($owner_id) {
			$this->owner_id = $owner_id;
		}
	
		public function getLists() {
			try{
				$db = new DB();
				$query=$db->getConnection()->prepare("Select * from list where board_id=?");
				if($query->execute(array($this->id))) {
					return $query->fetchAll(PDO::FETCH_CLASS,"TList");
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}		
		}

		public function output() {
			require(__ROOT__."/template/Board_overview.php");
		}
	}
?>