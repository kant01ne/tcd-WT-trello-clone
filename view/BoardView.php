<?php
	define('__ROOT__', dirname(dirname(__FILE__))); 
	
	Class BoardView {
		private $boardModel;
		private $boardCtrl;

		public function __construct($controller, $model) {
			$this->boardCtrl = $controller;
			$this->boardModel = $model;
		}
		
		public function output() {
			require_once(__ROOT__."/template/Board.php");
		}	
	}
?>