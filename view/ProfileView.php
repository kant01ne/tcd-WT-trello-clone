<?php
	define('__ROOT__', dirname(dirname(__FILE__))); 
	
	Class ProfileView {
		private $userModel;
		private $userCtrl;

		public function __construct($controller, $model) {
			$this->userCtrl = $controller;
			$this->userModel = $model;
		}
		
		public function output() {
			require_once(__ROOT__."/template/Profile.php");
		}	
	}
?>