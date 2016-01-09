<?php
	include '../DB.php';
	
	Class User {
		private $id;
		private $firstname;
		private $lastname;
		private $email;
		private $boards;

		public function __construct ($fname, $lname, $email) {
			if($fname) $this->firstname = $fname;
			if($lname) $this->lastname = $lname;
			if($email) $this->email = $email;
		}

		public function getFirstName() {
			return $this->firstname;
		}

		public function setFirstName($firstname) {
			$this->firstname =$firstname;
		}

		public function getLastName() {
			return $this->lastname;
		}

		public function setLastName($lastname) {
			$this->lastname =$lastname;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email =$email;
		}

		public function getBoards() {
			try{
				$db = new DB();
				$query=$db->getConnection()->prepare("Select * from board where owner_id=?");
				if($query->execute(array($this->id))) {
					return $query->fetchAll(PDO::FETCH_CLASS,"Board");
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}		
		}

		public function load($id) {
			try{
				$db = new DB();
				$query=$db->getConnection()->prepare("Select * from user where id=?");
				if($query->execute(array($id))) {
					$res = $query->fetch(PDO::FETCH_OBJ);
					$this->id = $res->id;
					$this->firstname = $res->firstname;
					$this->lastname = $res->lastname;
					$this->email = $res->email;
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

	}

?>