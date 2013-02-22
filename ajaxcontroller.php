<?php
	if(isset($_POST['controller'])) {
		$controller = $_POST['controller'];
		$action = $_POST['action'];
		$args = $_POST['args'];
	}
	
	if(isset($_GET['controller'])) {
		$controller = $_GET['controller'];
		$action = $_GET['action'];
		$args = $_GET['args'];
	}
	
//  	var_dump($_FILES['image']);
	
	require("apps/".$controller."/".$controller.".php");
	$Controller = ucfirst($controller);
	$temp = new $Controller();
	$args = array("post" => $_POST, "get" => $_GET, "files" => $_FILES);
	$temp->$action($args);

// 	$temp->$action($args);
// 	$controller::$action($args);
?>