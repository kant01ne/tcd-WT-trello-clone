<?php 
	include 'model/Board.php';
	include 'model/Card.php';
	include 'model/List.php';
	include 'model/User.php';
	
	include 'controller/UserCtrl.php';

	if($_POST['action'] == 'create-user') {
		$user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email']);
		$userCtrl = new UserCtrl($user);
		$userCtrl->save();
	}
	
	if($_POST['action'] == 'add-list') {
		echo 'add-list';
		$list = new List($_POST['name'])
		$listCtrl = new UserCtrl($user);
		$userCtrl->save();
	}

	header("Location: index.php");
	die();
?>
