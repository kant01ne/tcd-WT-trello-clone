<?php
	include 'model/Board.php';
	include 'view/BoardView.php';
	include 'controller/BoardCtrl.php';
	
	include 'model/User.php';
	include 'view/LoginView.php';
	include 'view/ProfileView.php';
	include 'controller/UserCtrl.php';
	$page = $_GET['page'];
	if (!empty($page)) {

		// Routing
	    $data = array(
	        'board' => array(
	        	'model' => 'Board', 
	        	'view' => 'BoardView', 
	        	'controller' => 'BoardCtrl',
	        	'params' => ['user','board']
	        	),
	        'login' => array(
	        	'model' => 'User',
	        	'view' => 'LoginView',
	        	'controller' => 'UserCtrl',
	        	'params' => []
	        	),
	        'profile' => array(
	        	'model' => 'User',
	        	'view' => 'ProfileView',
	        	'controller' => 'UserCtrl',
	        	'params' => ['user']
	        	)
	    );

	    foreach($data as $key => $components){
	        if ($page == $key) {
	            $model = $components['model'];
	            $view = $components['view'];
	            $controller = $components['controller'];
	            $params = $components['params'];
	            break;
	        }
	    }

	    if (isset($model)) {
			$access_granted = true;
	    	if (isset($params)) {
	    		//Should use cookies to store user details instead of GET params
	    		foreach ($params as $key => $value) {
	    			if(!isset($_GET[$value])) {
	    				$access_granted = false;
	    			}
	    		}
	    	}
    		if($access_granted) {
		        $m = new $model();
		        $c = new $controller($m);
		        $v = new $view($c, $m);
			    if (isset($_GET['action']) && !empty($_GET['action'])) {
				    $c->{$_GET['action']}();
				}
	        	echo $v->output();
	    	}
		} else {
			header("Location: index.php?page=login");
			die();
		}
	} else {
		header("Location: index.php?page=login");
		die();
	}
?>