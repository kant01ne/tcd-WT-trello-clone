<?php
	include 'DB.php';
	include '../model/Board.php';
	include '../model/List.php';

	Class BoardCtrl {
		private $boardModel;
		
		public function __construct($model) {
			$model->load($_GET['board']);
			$this->boardModel = $model;
		}

		public function save() {
			try{
				$db = new DB();
				$sql = "INSERT INTO board(name,description,owner_id) VALUES (:name,:description,:owner_id)";
				$q = $db->getConnection()->prepare($sql);
				if($q->execute(array(':name'=>$this->boardModel->getName(),':description'=>$this->boardModel->getDescription(),':owner_id'=>$this->boardModel->getOwnerId()))){
					echo "Row Successfully Inserted!";
				}
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function addList() {
			try{
				$db = new DB();
				$list = new TList($_POST["name"], $_POST["description"], $_GET["board"]);
				$sql = "INSERT INTO list(name,description,board_id) VALUES (:name,:description,:board_id)";
				$q = $db->getConnection()->prepare($sql);
				$q->execute(array(':name'=>$list->getName(),':description'=>$list->getDescription(),':board_id'=>$list->getBoardId()));
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function removeList() {
			try{
				$id = $_GET["list"];
				$db = new DB();
				$sql = "DELETE FROM list WHERE id=".$id;
				$q = $db->getConnection()->prepare($sql);
				$q->execute();
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function addCard() {
			try{
				$db = new DB();
				$card = new Card($_POST["name"], $_POST["description"], $_GET["list"]);
				$sql = "INSERT INTO card(name,description,list_id) VALUES (:name,:description,:list_id)";
				$q = $db->getConnection()->prepare($sql);
				$q->execute(array(':name'=>$card->getName(),':description'=>$card->getDescription(),':list_id'=>$card->getListId()));
				
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function removeCard() {
			try{
				$id = $_GET["card"];
				$db = new DB();
				$sql = "DELETE FROM card WHERE id=".$id;
				$q = $db->getConnection()->prepare($sql);
				$q->execute();
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
		
	}
?>