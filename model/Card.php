<?php
	include '../DB.php';
	
	Class Card {
		private $id;
		private $name;
		private $description;
		private $list_id;

		public function __construct ($name, $description, $list_id) {
			if($name) $this->name = $name;
			if($description) $this->description = $description;
			if($list_id) $this->list_id = $list_id;
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

		public function getListId() {
			return $this->list_id;
		}

		public function output() {
			require(__ROOT__."/template/Card.php");
		}

	}

?>