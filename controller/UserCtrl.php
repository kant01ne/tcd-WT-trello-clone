<?php
	include '../DB.php';

	Class UserCtrl {
		private $userModel;

		public function __construct($user) {
			//Register case
			if(isset($_POST['firstname'])) $user->setFirstName($_POST['firstname']); 
			if(isset($_POST['lastname'])) $user->setLastName($_POST['lastname']); 
			if(isset($_POST['email'])) $user->setEmail($_POST['email']); 
			
			//Profile page case
			if(isset($_GET['page']) && $_GET['page'] == 'profile' ) {
				$user->load($_GET['user']);
			}
			
			$this->userModel = $user;
		}

		public function register() {
			try{
				$db = new DB();
				$sql = "INSERT INTO user(firstname,lastname,email) VALUES (:firstname,:lastname,:email)";
				$q = $db->getConnection()->prepare($sql);
				if($q->execute(array(':firstname'=>$this->userModel->getFirstName(),':lastname'=>$this->userModel->getLastName(),':email'=>$this->userModel->getEmail()))){
					$id = $db->getConnection()->lastInsertId();
					header("Location: index.php?page=profile&user=".$id);
					die();
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function login() {
			try{
				$db = new DB();
				$sql = "SELECT * FROM user WHERE email='".$this->userModel->getEmail()."'";
				$q = $db->getConnection()->prepare($sql);
				if($q->execute()) {
					$res = $q->fetch(PDO::FETCH_OBJ);
					header("Location: index.php?page=profile&user=".$res->id);
					die();
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function addBoard() {
			try{
				$db = new DB();
				$board = new Board($_POST["name"], $_POST["description"], $_GET["user"]);
				$sql = "INSERT INTO board(name,description,owner_id) VALUES (:name,:description,:owner_id)";
				$q = $db->getConnection()->prepare($sql);
				$q->execute(array(':name'=>$board->getName(),':description'=>$board->getDescription(),':owner_id'=>$board->getOwnerId()));
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function removeBoard() {
			try{
				$id = $_GET["board"];
				$db = new DB();
				$sql = "DELETE FROM board WHERE id=".$id;
				$q = $db->getConnection()->prepare($sql);
				$q->execute();
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

	}
?>