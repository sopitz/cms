<?php
include("classes/error.php");
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");


if (isset($_COOKIE['user'])) {
	$value = $_COOKIE['user'];
	setcookie("user", $value, time()+3600);
}


$loader = new Loader();
$controller = $loader->createController();
$controller->executeAction();



function my_error_handler() {
	echo "test";
}
?>